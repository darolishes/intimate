```php
<?php
// Module 2: AI-gesteuertes Storytelling

require_once('ai-storytelling.php');

function module2_init() {
    // Register the AI storytelling functionality
    add_action('init', 'register_ai_storytelling');
}

function register_ai_storytelling() {
    // Initialize the AI storytelling class
    $ai_storytelling = new AI_Storytelling();

    // Register the AI storytelling hooks
    $ai_storytelling->register_hooks();
}

module2_init();
```