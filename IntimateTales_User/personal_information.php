<?php
/**
 * Personal Information Module for IntimateTales User Plugin
 * 
 * This module handles the personal information of the user including first name, last name, gender, and date of birth.
 * 
 * @package IntimateTales_User_Plugin
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class IT_Personal_Information {
    private $user_id;

    public function __construct($user_id) {
        $this->user_id = $user_id;
    }

    public function updatePersonalInformation($first_name, $last_name, $gender, $dob) {
        update_user_meta($this->user_id, 'first_name', $first_name);
        update_user_meta($this->user_id, 'last_name', $last_name);
        update_user_meta($this->user_id, 'gender', $gender);
        update_user_meta($this->user_id, 'dob', $dob);

        return array('message' => 'updateSuccess');
    }

    public function getPersonalInformation() {
        $first_name = get_user_meta($this->user_id, 'first_name', true);
        $last_name = get_user_meta($this->user_id, 'last_name', true);
        $gender = get_user_meta($this->user_id, 'gender', true);
        $dob = get_user_meta($this->user_id, 'dob', true);

        return array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'gender' => $gender,
            'dob' => $dob
        );
    }
}

// Usage
$user_id = get_current_user_id();
$personal_info = new IT_Personal_Information($user_id);

// Update personal information
$response = $personal_info->updatePersonalInformation('John', 'Doe', 'Male', '1990-01-01');
if ($response['message'] === 'updateSuccess') {
    // Handle success
}

// Get personal information
$personal_info_data = $personal_info->getPersonalInformation();
