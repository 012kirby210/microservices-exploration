<?php


namespace App\Tests\Infrastructure\Repository;


use App\Domain\Entity\Comment;
use PHPUnit\Framework\TestCase;
use App\Tests\PrivatePropertyManipulator;

class CommentRepositoryTest extends TestCase
{
	use PrivatePropertyManipulator;

	/** @test
	 * The test assert that on an empty database :
	 *  - any comment saved will actually be persisted
	 *  - any comment fetched from the database :
	 *     - owns the same values as it was before its insertion.
	 */

	public function itSavesACommentToTheDatabase()
	{
		$comment = $this->getComment();

		$repository = new CommentRepository();
		$this->assertEquals(0, $repository->findAll());

		$repository->save($comment);

		$this->assertEquals(1,$repository->findAll());
		$commentFromRepository = $repository->findById(1);

		$this->assertEquals("8",
			$this->getByReflection($commentFromRepository,'userId'));
		$this->assertEquals("14",
			$this->getByReflection($commentFromRepository,'topicId'));
	}

	private function getComment()
	{
		$comment = new Comment();
		$this->setByReflection($comment,'userId','8');
		$this->setByReflection($comment,'topicId','14');
		$this->setByReflection($comment,'comment','je suis le commentaire');

	}
}