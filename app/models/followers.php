<?php

namespace Model;

class  Followers{
    public static function get_all_followers($user_id) {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM followers");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function find_user($user_id) {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM users WHERE user_id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row;
    }
}
