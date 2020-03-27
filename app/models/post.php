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
        ];
        $stmt = $db->prepare("INSERT INTO posts (userId,username,caption,imagePath) VALUES (:userId,:username,:caption,:imagePath)");
        $stmt->execute($data);
    }

    public static function getComments()
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * from comments INNER JOIN posts ON comments.postId = posts.id ORDER BY comments.id");
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function getFeed()
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM posts ORDER BY id DESC");
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function getTrending()
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

    public static function addComment($postId,$userId,$username,$commentNote)
    {
        $db = \DB::get_instance();
        $data = [
            "userId" => $userId,
            "username"=> $username,
            "postId" => $postId,
            "commentNote"=> $commentNote
        ];
        $stmt = $db->prepare("INSERT INTO comments (postId,userId,username,commentNote) VALUES (:postId,:userId,:username,:commentNote)");
        var_dump($stmt);
        $stmt->execute($data);
        return true;
    }

}


