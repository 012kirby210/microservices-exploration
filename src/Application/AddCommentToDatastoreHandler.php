<?php


namespace App\Application;


use App\Domain\ValueObject\CommentUpsertedEvent;

class AddCommentToDatastoreHandler
{
	public function handle(CommentUpsertedEvent $event)
	{
		return true;
	}
}