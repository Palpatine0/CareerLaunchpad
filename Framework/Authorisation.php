<?php

namespace Framework;

class Authorisation {
    public static function isOwner($resourceId) {
        // Retrieve current user information from the session
        $sessionUser = Session::get('user');


        // Check if the session has user information and if the user ID is set
        if ($sessionUser !== null && isset($sessionUser['id'])) {
            // Convert the user ID in the session to an integer
            $sessionUserId =  $sessionUser['id'];
            // Compare the user ID in the session with the provided resource ID


            return $sessionUserId === $resourceId;
        }

        // If the session does not have user information or the user ID is not set, return false
        return false;
    }
}