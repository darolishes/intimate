```php
<?php
/**
 * Unified Decision Making Module
 *
 * This module facilitates the unified decision-making process for couples.
 *
 * @package IntimateTales_Couples_Interaction_Plugin
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class UnifiedDecisionMaking {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_decision_post_type' ) );
	}

	/**
	 * Register a custom post type for decisions.
	 */
	public function register_decision_post_type() {
		$args = array(
			'public' => true,
			'label'  => 'Decisions',
		);
		register_post_type( 'decision', $args );
	}

	/**
	 * Create a new decision.
	 *
	 * @param int $story_id The ID of the story.
	 * @param int $user_id The ID of the user.
	 * @param string $decision The decision made by the user.
	 * @return int|WP_Error The post ID on success. The value 0 or WP_Error on failure.
	 */
	public function create_decision( $story_id, $user_id, $decision ) {
		$postarr = array(
			'post_type'    => 'decision',
			'post_title'   => $decision,
			'post_content' => $decision,
			'post_status'  => 'publish',
			'post_author'  => $user_id,
			'meta_input'   => array(
				'story_id' => $story_id,
			),
		);
		return wp_insert_post( $postarr );
	}

	/**
	 * Get the decisions for a story.
	 *
	 * @param int $story_id The ID of the story.
	 * @return WP_Query The WP_Query instance.
	 */
	public function get_decisions_for_story( $story_id ) {
		$args = array(
			'post_type'  => 'decision',
			'meta_query' => array(
				array(
					'key'     => 'story_id',
					'value'   => $story_id,
					'compare' => '=',
				),
			),
		);
		return new WP_Query( $args );
	}
}

new UnifiedDecisionMaking();
```