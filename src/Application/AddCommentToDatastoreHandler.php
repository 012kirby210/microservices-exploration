<?php


namespace App\Application;


use App\Domain\Entity\Comment;
use App\Domain\ValueObject\CommentUpsertedEvent;
use JMS\Serializer\Serializer;

class AddCommentToDatastoreHandler
{
	private $serializer;

	public function __construct(Serializer $serializer)
	{
		$this->serializer=$serializer;
	}

	/**
	 * Method to handle the event of upserting a comment.
	 * The event is arriving unserialized.
	 * We then use an involution it to transform it into an entity object.
	 * @param CommentUpsertedEvent $event
	 * @return bool
	 */
	public function handle(CommentUpsertedEvent $event)
	{
		$data = $event->getData();
		$comment = $this->serializer->deserialize(
			$this->serializer->serialize($data,"json"),
			Comment::class,
			"json"
			);
		return true;
	}
}
