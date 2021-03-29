<?php


namespace App\Tests;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class AliveControllerTest extends WebTestCase
{
	/** @test */
	public function itReturnASuccess()
	{
		$client = $this->createClient();
		$client->request('GET','/adapter/comments/alive');

		$this->assertEquals(200, $client->getResponse()->getStatusCode());
	}
}