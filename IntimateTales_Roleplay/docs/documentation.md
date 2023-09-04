# IntimateTales Roleplay Module Documentation

## Table of Contents

1. [Introduction](#introduction)
2. [Installation](#installation)
3. [Features](#features)
4. [Development](#development)
5. [Shared Dependencies](#shared-dependencies)

## Introduction

The IntimateTales Roleplay Module offers users an immersive role-playing experience where they can engage in captivating storylines, make decisions, and interact with characters in real-time.

## Installation

To install the IntimateTales Roleplay Module, follow the instructions in the `README.md` file located in the root directory of the project.

## Features

### Dynamic Storylines

AI-driven narratives that respond to user choices. Refer to `src/Storyline.php` for implementation details.

### Character Customization

Users create and customize their characters. Refer to `src/Character.php` and `src/CharacterModule.php` for implementation details.

### Real-time Interaction

Chat and decision-making for interactive gameplay. Load Stories from created posts post_type story. Refer to `src/Interaction.php` for implementation details.

### Progress Tracking

Users can review their storyline progression. Refer to `src/Progress.php` for implementation details.

### Seamless Integration

Syncs data with IntimateTales Core and plugins. Refer to `src/Integration.php` for implementation details.

### Interactive Loading

Displays loading bars and spinners for smoother data retrieval. Refer to `src/Loading.php` for implementation details.

### Story Management

Create and manage captivating storylines. Refer to `src/StoryManagement.php` for implementation details.

### Interactive Tools

Real-time chat and decision-making features. Refer to `src/InteractiveTools.php` for implementation details.

## Development

Developers ensure seamless integration with the IntimateTales Core Plugin and prioritize a smooth user experience. The module collaborates with existing plugins for potential future expansions. Interactive loading elements enhance user engagement.

## Shared Dependencies

Refer to `includes/acf-fields.php` for ACF fields used across multiple PHP files. All PHP files use standard WordPress functions for database interaction, user management, and other core functionalities. JavaScript functions in `assets/js/main.js` and CSS styles in `assets/css/style.css` are used across the application. All PHP files adhere to the WordPress coding standards as defined in `includes/wp-coding-standards.php`.