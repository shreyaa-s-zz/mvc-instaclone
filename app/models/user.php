<?php

namespace Model;
session_start();


class User                                               //not user.following based as of yet
{
  public static function get_user($username)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $row = $stmt->fetch();
        $_SESSION['id'] = $row['id'];
        return $row;
    }

    public static function create_user($name,$username,$email,$password)
    {
        $db = \DB::get_instance();
        $data = [
            'name' => $name,
            'username'=> $username,
            'email' => $email,
            'password' => $password,
        ];
        $_SESSION['username'] = $username;
        $sql = $db->prepare("INSERT INTO users (name,username,email,password) VALUES (:name,:username,:email,:password);");
        $sql->execute($data);
    }
}
