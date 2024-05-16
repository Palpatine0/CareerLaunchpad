<?php

namespace Framework;

class Session {
    /**
     * Start a session
     * If the session has not started, start a new session.
     *
     * @return void
     */
    public static function start() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }



    /**
     * Set a session key-value pair
     * Store the value under the specified session key.
     *
     * @param string $key The session key
     * @param mixed $value The value to store
     * @return void
     */
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    /**
     * Get a session value by key
     * If the specified key exists, return its value; if it does not exist, return the default value.
     *
     * @param string $key The session key
     * @param mixed $default The default value to return if the key does not exist
     * @return mixed The value corresponding to the session key or the default value
     */
    public static function get($key, $default = null) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    /**
     * Check if a session key exists
     * Determine if the specified key is set in the session.
     *
     * @param string $key The session key
     * @return bool Returns true if the key exists, false otherwise
     */
    public static function has($key) {
        return isset($_SESSION[$key]);
    }

    /**
     * Clear a specific session key
     * If the key exists, remove it from the session.
     *
     * @param string $key The session key
     * @return void
     */
    public static function clear($key) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Clear all session data
     * Ends the session and removes all stored data.
     *
     * @return void
     */
    public static function clearAll() {
        session_unset(); // Remove all session variables
        session_destroy(); // Destroy the session
    }

    public static function setFlashMessage($key, $message) {
        // Call the set method to store the message in the session, prefixing the key with 'flash_' for differentiation.
        self::set('flash_' . $key, $message);
    }


    public static function getFlashMessage($key, $default = null) {
        // Retrieve the message from the session; if it does not exist, return the default value.
        $message = self::get('flash_' . $key, $default);
        // Delete the message from the session to ensure it can only be read once.
        self::clear('flash_' . $key);
        return $message;
    }
}