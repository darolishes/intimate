```php
<?php
/**
 * Likes and Dislikes Settings for IntimateTales User Plugin
 *
 * @package IntimateTales_User_Plugin
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class IT_User_Likes_Dislikes {

	private $user_id;

	public function __construct( $user_id ) {
		$this->user_id = $user_id;
	}

	public function get_likes_dislikes() {
		return get_user_meta( $this->user_id, 'it_user_likes_dislikes', true );
	}

	public function update_likes_dislikes( $likes_dislikes ) {
		update_user_meta( $this->user_id, 'it_user_likes_dislikes', $likes_dislikes );
	}

	public function delete_likes_dislikes() {
		delete_user_meta( $this->user_id, 'it_user_likes_dislikes' );
	}
}

function it_user_likes_dislikes_init() {
	$user_id = get_current_user_id();
	$it_user_likes_dislikes = new IT_User_Likes_Dislikes( $user_id );

	// Handle AJAX request for updating likes and dislikes.
	add_action( 'wp_ajax_update_likes_dislikes', function() use ( $it_user_likes_dislikes ) {
		check_ajax_referer( 'update_likes_dislikes_nonce' );

		$likes_dislikes = $_POST['likes_dislikes'];
		$it_user_likes_dislikes->update_likes_dislikes( $likes_dislikes );

		wp_send_json_success( array( 'message' => 'Likes and dislikes updated successfully.' ) );
	} );
}

add_action( 'init', 'it_user_likes_dislikes_init' );
```