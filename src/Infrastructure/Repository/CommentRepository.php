<?php


namespace App\Infrastructure\Repository;

use App\Domain\Repository\CommentRepositoryInterface;
use App\Domain\Entity\Comment;
use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository implements CommentRepositoryInterface
{

	/**
	 * @inheritDoc
	 * @param Comment $comment
	 * @return mixed|void
	 */
	public function save(Comment $comment)
	{
		$this->getEntityManager()->persist($comment);
		$this->getEntityManager()->flush();
	}
}