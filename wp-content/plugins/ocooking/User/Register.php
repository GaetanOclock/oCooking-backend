<?php

namespace oCooking\User;

class Register {

    static public function initRoute()
    {
        register_rest_route( 'ocooking/v1', '/user', [
            'methods' => 'POST',
            'callback' => [self::class, 'handleRegistration'],
        ]);
    }

    static public function handleRegistration()
    {
        $postData = json_decode(file_get_contents("php://input"), true);
        $userId = wp_create_user(
            $postData['username'],
            $postData['password'],
            $postData['email']
        );
        return json_encode($userId);
    }
}
