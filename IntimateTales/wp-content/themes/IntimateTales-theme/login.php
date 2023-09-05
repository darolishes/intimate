```php
<?php
/**
 * Template Name: Login Page
 */

get_header();

if ( is_user_logged_in() ) {
    wp_redirect( home_url() ); 
    exit;
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $creds = array();
    $creds['user_login'] = $_POST['username'];
    $creds['user_password'] = $_POST['password'];
    $creds['remember'] = true;
    $user = wp_signon( $creds, false );
    if ( is_wp_error($user) ) {
        echo $user->get_error_message();
    } else {
        wp_redirect( home_url() ); 
        exit;
    }
}

?>

<div id="login-form">
    <form method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Log In">
    </form>
    <p>Don't have an account? <a href="<?php echo wp_registration_url(); ?>">Register</a></p>
</div>

<?php get_footer(); ?>
```