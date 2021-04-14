<?php


namespace App\infrastructure\Repository;

use App\Domain\Repository\CommentRepositoryInterface;
use App\Domain\Entity\Comment;

class CommentRepository implements CommentRepositoryInterface
{
	/**
	 * @inheritDoc
	 * @param Comment $comment
	 * @return mixed|void
	 */
	public function save(Comment $comment)
	{

	}
}