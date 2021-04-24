<?php


namespace App\Tests\Infrastructure\Repository;


use App\Domain\Entity\Comment;
use App\Infrastructure\Repository\CommentRepository;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\PrivatePropertyManipulator;

class CommentRepositoryTest extends WebTestCase
{
	use PrivatePropertyManipulator;
	use FixturesTrait;

	/** @test
	 * The test assert that on an empty database :
	 *  - any comment saved will actually be persisted
	 *  - any comment fetched from the database :
	 *     - owns the same values as it was before its insertion.
	 */

	public function itSavesACommentToTheDatabase()
	{
		$this->loadFixtures([]);
		$comment = $this->getComment();

		$repository = self::bootKernel()->getContainer()->get(CommentRepository::class);
		//$repository = new CommentRepository();
		$this->assertEquals(0, count($repository->findAll()));

		$repository->save($comment);

		$this->assertEquals(1,count($repository->findAll()));
		$commentFromRepository = $repository->findOneBy(['id' => 1]);
		var_dump($repository->findById(1));

		$this->assertEquals("8",
			$this->getByReflection($commentFromRepository,'userId'));
		$this->assertEquals("14",
			$this->getByReflection($commentFromRepository,'topicId'));
	}

	private function getComment() :Comment
	{
		$comment = new Comment();
		$this->setByReflection($comment,'userId','8');
		$this->setByReflection($comment,'topicId','14');
		$this->setByReflection($comment,'comment','je suis le commentaire');
		return $comment;
	}
}