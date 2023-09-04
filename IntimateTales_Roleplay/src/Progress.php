```php
<?php
/**
 * Class Progress
 *
 * This class is responsible for tracking and managing user progress in the storylines.
 *
 * @package IntimateTales_Roleplay
 */

class Progress {

    /**
     * Get user progress.
     *
     * @param int $user_id User ID.
     * @return array User progress data.
     */
    public function get_user_progress( $user_id ) {
        $progress = get_user_meta( $user_id, 'it_roleplay_progress', true );
        return is_array( $progress ) ? $progress : array();
    }

    /**
     * Update user progress.
     *
     * @param int $user_id User ID.
     * @param array $progress New progress data.
     * @return bool True on success, false on failure.
     */
    public function update_user_progress( $user_id, $progress ) {
        return update_user_meta( $user_id, 'it_roleplay_progress', $progress );
    }

    /**
     * Reset user progress.
     *
     * @param int $user_id User ID.
     * @return bool True on success, false on failure.
     */
    public function reset_user_progress( $user_id ) {
        return delete_user_meta( $user_id, 'it_roleplay_progress' );
    }
}
```