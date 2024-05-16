<?php

namespace Framework\MiddleWare;

use Framework\Session;

class Authorise {
    /**
     * Check if the user is authenticated
     *
     * @return bool Returns true if the user is authenticated, false otherwise
     */
    public function isAuthenticated() {
        // Check if the session has user information
        return Session::has('user');
    }

    /**
     * Handle user request
     * Redirects appropriately based on user role and authentication status.
     *
     * @param string $role The user role to check
     * @return bool
     */
    public function handle($role) {
        // If the role is 'guest' and the user is authenticated, redirect to the homepage
        if ($role === 'guest' && $this->isAuthenticated()) {
            return redirect('/public');
        } // If the role is 'auth' (authenticated user) and the user is not authenticated, redirect to the login page
        elseif ($role === 'auth' && !$this->isAuthenticated()) {
            return redirect('/public/auth/login');
        }
    }
}