<?php

namespace Model;

class User                                               //not user.following based as of yet
{
  public static function get_user()
    {
        $db = \DB::get_instance();
        $username = $_SESSION['username'];
        $sql = $db->query("SELECT * FROM users WHERE username = $username;");
        $row = $sql->fetchAll();
        return $row;
    }

    public static function create_user($name,$username,$email,$password)
    {
        $db = \DB::get_instance();
        $data = [
            ":name" => $name,
            ":username" => $username,
            ":email" => $email,
            ":password" => $password
        ];
        $sql = $db->prepare("INSERT INTO users (name,username,email,password) VALUES (:name,:username,:email,:password);");
        $sql->execute($data);
    }
}
