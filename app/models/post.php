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

    public static function get_comments()
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * from comments INNER JOIN posts ON comments.postId = posts.id ORDER BY comments.id");
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function get_all()
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM posts ORDER BY id");
        $rows = $stmt->fetchAll();
        return $rows;
    }



}


