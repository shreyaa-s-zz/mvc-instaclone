<?php

namespace Model;

class User                                               //not user.following based as of yet
{
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
}
