<?php
/**
 * Loading Class for IntimateTales Roleplay
 *
 * Handles all loading operations
 *
 * @package IntimateTales_Roleplay
 */

class Loading {

    /**
     * Display loading spinner
     *
     * @return void
     */
    public function display_spinner() {
        echo '<div id="loading-spinner"></div>';
    }

    /**
     * Display loading bar
     *
     * @return void
     */
    public function display_loading_bar() {
        echo '<div id="loading-bar"></div>';
    }

    /**
     * Initialize loading elements
     *
     * @return void
     */
    public function init_loading_elements() {
        add_action('wp_footer', array($this, 'display_spinner'));
        add_action('wp_footer', array($this, 'display_loading_bar'));
    }
}

// Initialize Loading
$loading = new Loading();
$loading->init_loading_elements();