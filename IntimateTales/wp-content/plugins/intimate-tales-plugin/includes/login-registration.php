```php
<?php
/**
 * IntimateTales Login & Registration
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('IntimateTales_Login_Registration')) {

    class IntimateTales_Login_Registration {

        public function __construct() {
            add_action('init', array($this, 'register_user'));
            add_action('init', array($this, 'login_user'));
        }

        public function register_user() {
            if (isset($_POST['register'])) {
                $username = sanitize_user($_POST['username']);
                $password = esc_attr($_POST['password']);
                $email = sanitize_email($_POST['email']);

                $user_id = username_exists($username);

                if (!$user_id && email_exists($email) == false) {
                    $user_id = wp_create_user($username, $password, $email);

                    if (!is_wp_error($user_id)) {
                        // User has been created
                        $user = get_user_by('id', $user_id);
                        $user->set_role('subscriber');
                        wp_redirect('login');
                        exit;
                    } else {
                        // Error creating user
                        return $user_id->get_error_message();
                    }
                } else {
                    // User or email already exists.
                    return 'User already exists.';
                }
            }
        }

        public function login_user() {
            if (isset($_POST['login'])) {
                $username = sanitize_user($_POST['username']);
                $password = esc_attr($_POST['password']);

                $user = wp_signon(array(
                    'user_login'    => $username,
                    'user_password' => $password,
                    'remember'      => true
                ));

                if (is_wp_error($user)) {
                    // Login failed
                    return $user->get_error_message();
                } else {
                    // Login successful
                    wp_redirect('dashboard');
                    exit;
                }
            }
        }
    }

    new IntimateTales_Login_Registration();
}
```