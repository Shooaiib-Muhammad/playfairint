<?php
namespace SiteGround_Optimizer\Supercacher;

use SiteGround_Optimizer\Helper\Update_Queue_Trait;

/**
 * SG CachePress class that handle comment updates and purge the cache.
 */
class Supercacher_Comments {
	use Update_Queue_Trait;
	/**
	 * Purge comment post cache.
	 *
	 * @since  5.0.0
	 *
	 * @param  int $comment_id The comment ID.
	 */
	public function purge_comment_post( $comment_id ) {
		// Get the comment data.
		$commentdata = get_comment( $comment_id, OBJECT );

		// Get the post id from the comment.
		$comment_post_id = is_object( $commentdata ) ? $commentdata->comment_post_ID : $commentdata['comment_post_ID'];

		// Purge the rest api cache.
		$this->update_queue( array(
			get_rest_url(),
			get_permalink( $comment_post_id ),
		));
	}
}
