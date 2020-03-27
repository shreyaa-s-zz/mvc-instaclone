<?php

namespace Model;

class  Followers{
    public static function getFeed_followers($id) {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM followers");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function find_user($id) {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM users WHERE user_id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row;
    }
}
