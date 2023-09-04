```php
<?php
/**
 * Class OptionsPages
 *
 * This class is responsible for creating and managing options pages using ACF JSON configurations.
 *
 * @package IntimateTales_ACF_Integration
 */

namespace IntimateTales_ACF_Integration\Includes;

use ACF;

class OptionsPages {

    /**
     * Path to the options pages JSON configuration file.
     *
     * @var string
     */
    private $json_config_path = __DIR__ . '/../acf-json/options_pages.json';

    /**
     * OptionsPages constructor.
     */
    public function __construct() {
        $this->register_options_pages();
    }

    /**
     * Register options pages using ACF JSON configurations.
     */
    private function register_options_pages() {
        $json_config = file_get_contents($this->json_config_path);
        $options_pages = json_decode($json_config, true);

        foreach ($options_pages as $options_page) {
            if (function_exists('acf_add_options_page')) {
                acf_add_options_page($options_page);
            }
        }
    }
}
```