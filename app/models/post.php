<?php

namespace Model;

class Post {
    public static function create($path,$caption) {
        $db = \DB::get_instance();
        $username = $_SESSION['username'];
        $userId = $_SESSION['userId'];
        $data = [
            'userId' => $userId,
            'username'=> $username,
            'imagePath' => $path,
            'caption' => $caption,
        ];
        $stmt = $db->prepare("INSERT INTO posts (userId,username,caption,imagePath) VALUES (:userId,:username,:caption,:imagePath)");
        $stmt->execute([$data]);
    }


}


