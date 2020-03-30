<?php

namespace Model;

class Feed                                               //not user.following based as of yet
{
    public static function get_all()
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM posts ORDER BY id");
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function get_user()
    {
        $db = \DB::get_instance();
        $data = [
            ":username" => $_SESSION["username"],
        ];
        $sql = $db->prepare("SELECT * FROM users WHERE username=:username");
        $sql->execute($data);
        $row = $sql->fetchAll();
        return $row;
    }

    public static function get_comments()
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * from comments INNER JOIN posts ON comments.postId = posts.id ORDER BY comments.id");
        $rows = $stmt->fetchAll();
        return $rows;
    }

}
