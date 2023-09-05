<?php
/**
 * IntimateTales Roleplay Module
 *
 * @package IntimateTales_Roleplay
 */

// Include necessary files
require_once __DIR__ . '/Storyline.php';
require_once __DIR__ . '/Character.php';
require_once __DIR__ . '/Interaction.php';
require_once __DIR__ . '/Progress.php';
require_once __DIR__ . '/Integration.php';
require_once __DIR__ . '/Loading.php';
require_once __DIR__ . '/StoryManagement.php';
require_once __DIR__ . '/CharacterModule.php';
require_once __DIR__ . '/InteractiveTools.php';

// Initialize classes
$storyline = new Storyline();
$character = new Character();
$interaction = new Interaction();
$progress = new Progress();
$integration = new Integration();
$loading = new Loading();
$storyManagement = new StoryManagement();
$characterModule = new CharacterModule();
$interactiveTools = new InteractiveTools();

// Run the module
$storyline->run();
$character->run();
$interaction->run();
$progress->run();
$integration->run();
$loading->run();
$storyManagement->run();
$characterModule->run();
$interactiveTools->run();