<?php

namespace Model;

class Post {
    public static function create($userId,$username,$caption,$path) {
        $db = \DB::get_instance();
        $data = [
            "userId" => $userId,
            "username"=> $username,
            "caption" => $caption,
            "imagePath" => $path,
            "likes" => "0",
        ];
        $stmt = $db->prepare("INSERT INTO posts (userId,username,caption,imagePath,likes) VALUES (:userId,:username,:caption,:imagePath,:likes)");
        $stmt->execute($data);
    }

    public static function get_comments()
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * from comments INNER JOIN posts ON comments.postId = posts.id ORDER BY comments.id");
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function get_feed()
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM posts ORDER BY id DESC");
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function get_trending()
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM posts ORDER BY likes,id DESC");
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function like($id)
    {
        $db = \DB::get_instance();
        $sql = ("UPDATE posts SET likes = likes+1 WHERE id=$id;");
        $db->query($sql);
        return true;
    }

}


