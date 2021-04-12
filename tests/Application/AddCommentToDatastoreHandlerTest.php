<?php


namespace App\Tests\Application;


use App\Application\AddCommentToDatastoreHandler;
use App\Domain\ValueObject\CommentUpsertedEvent;
use Liip\FunctionalTestBundle\Test\WebTestCase;

class AddCommentToDatastoreHandlerTest extends WebTestCase
{
	/** @test */
	public function itHandlesAComment()
	{
		$request = file_get_contents(__DIR__ . '/AddCommentToDatastoreHandlerTest/request.json');
		$serializer = self::bootKernel()->getContainer()->get('jms_serializer');
		$event = $serializer->deserialize($request, CommentUpsertedEvent::class, 'json');

		$handler = new AddCommentToDatastoreHandler($serializer);
		$results = $handler->handle($event);
		$this->assertEquals(true, $results);
	}
}
