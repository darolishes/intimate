```php
<?php
/**
 * IntimateTales User Feedback Mechanism
 *
 * This file handles the user feedback mechanism for the IntimateTales WordPress plugin.
 *
 * @package IntimateTales
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'IntimateTales_User_Feedback' ) ) :

class IntimateTales_User_Feedback {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_feedback_page' ) );
		add_action( 'admin_init', array( $this, 'save_feedback' ) );
	}

	/**
	 * Add feedback page to admin menu.
	 */
	public function add_feedback_page() {
		add_submenu_page(
			'options-general.php',
			'User Feedback',
			'User Feedback',
			'manage_options',
			'intimate-tales-user-feedback',
			array( $this, 'render_feedback_page' )
		);
	}

	/**
	 * Render feedback page.
	 */
	public function render_feedback_page() {
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form method="post" action="options.php">
				<?php
				settings_fields( 'intimate-tales-user-feedback' );
				do_settings_sections( 'intimate-tales-user-feedback' );
				submit_button( 'Save Feedback' );
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * Save feedback.
	 */
	public function save_feedback() {
		register_setting( 'intimate-tales-user-feedback', 'intimate_tales_user_feedback' );
	}

}

endif;

return new IntimateTales_User_Feedback();
```