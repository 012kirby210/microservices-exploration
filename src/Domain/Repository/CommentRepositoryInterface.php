<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Comment;

/**
 * CQRS application :
 * https://martinfowler.com/bliki/CQRS.html
 *
 * Loose coupling by scaling horizontally and delegate.
 *
 * Interface CommentRepositoryInterface
 * @package App\Domain\Repository
 */
interface CommentRepositoryInterface
{
	/**
	 * It saves a comment.
	 * @param Comment $comment
	 * @return mixed
	 */
	public function save(Comment $comment);
}