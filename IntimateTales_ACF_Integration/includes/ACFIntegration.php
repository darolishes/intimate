<?php
namespace IntimateTales_ACF_Integration;

use IntimateTales_ACF_Integration\CustomPostTypes;
use IntimateTales_ACF_Integration\Taxonomies;
use IntimateTales_ACF_Integration\OptionsPages;

class ACFIntegration {
    private $custom_post_types;
    private $taxonomies;
    private $options_pages;

    public function __construct() {
        $this->custom_post_types = new CustomPostTypes();
        $this->taxonomies = new Taxonomies();
        $this->options_pages = new OptionsPages();
    }

    public function init() {
        $this->custom_post_types->create_from_json();
        $this->taxonomies->create_from_json();
        $this->options_pages->create_from_json();
    }
}

$acf_integration = new ACFIntegration();
$acf_integration->init();
