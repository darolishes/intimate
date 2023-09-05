```php
<?php
/**
 * SMS Template for IntimateTales Couples Interaction Plugin
 * 
 * This template is used when sending SMS notifications to users.
 */

function intimateTales_sms_template($user, $message) {
    // Define the SMS template
    $sms_template = "
    Hello {$user->display_name},

    {$message}

    Best,
    IntimateTales Team
    ";

    return $sms_template;
}
```