<?php
namespace SiteGround_Optimizer\Helper;

/**
 * Trait used for factory pattern in the plugin.
 */
trait Update_Queue_Trait {

	/**
	 * Update the purge queue.
	 *
	 * @since 5.9.0
	 *
	 * @param string $urls The URLs to purge.
	 */
	public function update_queue( $urls ) {
		// Get the current purge queue.
		$queue = get_option( 'siteground_optimizer_smart_cache_purge_queue', array() );

		// If there is already a data present on it, update the value.
		$queue = array_unique( array_merge( $queue, $urls ) );

		// Record the updated queue value in the database.
		update_option( 'siteground_optimizer_smart_cache_purge_queue', $queue );
	}
}
