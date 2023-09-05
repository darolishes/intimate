<?php
/**
 * Storyline Class
 *
 * This class handles all operations related to storylines in the IntimateTales Roleplay module.
 *
 * @package IntimateTales_Roleplay
 */

class Storyline {

    /**
     * Get all storylines
     *
     * This function retrieves all storylines from the database.
     *
     * @return array An array of storylines.
     */
    public function get_all_storylines() {
        $args = array(
            'post_type' => 'story',
            'posts_per_page' => -1,
        );

        $storylines = new WP_Query($args);

        return $storylines->posts;
    }

    /**
     * Get storyline by ID
     *
     * This function retrieves a specific storyline by its ID.
     *
     * @param int $id The ID of the storyline.
     * @return WP_Post The storyline post object.
     */
    public function get_storyline_by_id($id) {
        return get_post($id);
    }

    /**
     * Create storyline
     *
     * This function creates a new storyline.
     *
     * @param array $data The data for the new storyline.
     * @return int|WP_Error The post ID on success. The value 0 or WP_Error on failure.
     */
    public function create_storyline($data) {
        $post_id = wp_insert_post(array(
            'post_title'    => $data['title'],
            'post_content'  => $data['content'],
            'post_status'   => 'publish',
            'post_type'     => 'story',
        ));

        return $post_id;
    }

    /**
     * Update storyline
     *
     * This function updates an existing storyline.
     *
     * @param int $id The ID of the storyline.
     * @param array $data The new data for the storyline.
     * @return int|WP_Error The post ID on success. The value 0 or WP_Error on failure.
     */
    public function update_storyline($id, $data) {
        $post_id = wp_update_post(array(
            'ID'            => $id,
            'post_title'    => $data['title'],
            'post_content'  => $data['content'],
        ));

        return $post_id;
    }

    /**
     * Delete storyline
     *
     * This function deletes a storyline.
     *
     * @param int $id The ID of the storyline.
     * @return bool True on success, false on failure.
     */
    public function delete_storyline($id) {
        return wp_delete_post($id, true);
    }
}