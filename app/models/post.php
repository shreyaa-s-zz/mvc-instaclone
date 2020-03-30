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
        $stmt = $db->query("SELECT * from comments ORDER BY comments.id");
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

    public static function like($id,$userId)
    {
        $db = \DB::get_instance();
        $data1 = [
            "postId" => $id,
        ];
        $sql = $db->prepare("UPDATE posts SET likes = likes+1 WHERE id=:postId;");
        var_dump($sql);
        $sql->execute($data1);
        $data2 = [
            "userId" => $userId,
            "postId" => $id,
        ];
        $stmt = $db->prepare("INSERT INTO likes (postId,userId) VALUES (:postId,:userId)");
        var_dump($stmt);
        $stmt->execute($data2);
        return true;
    }

    public static function addComment($postId,$userId,$username,$commentNote)
    {
        $db = \DB::get_instance();
        $data = [
            "postId" => $postId,
            "userId" => $userId,
            "username"=> $username,
            "commentNote"=> $commentNote
        ];
        $stmt = $db->prepare("INSERT INTO comments (postId,userId,username,commentNote) VALUES (:postId,:userId,:username,:commentNote)");
        $stmt->execute($data);
        return true;
    }

    public static function getLiked()
    {
        $userId = $_SESSION['id'];
        $data = [
            'userId'=> $userId
        ];
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM likes WHERE userId = :userId");
        $stmt->execute($data);
        $rows = $stmt->fetch();
        return $rows;
    }

}


