<?php

namespace Model;

class Check                                               //not user.following based as of yet
{
  public static function loginCheck($username, $passwordHash) {
    $db = \DB::get_instance();
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $row = $stmt->fetch();
    if ($row['password'] ==  $passwordHash)
    {
        $_SESSION['username'] == $username;
        $_SESSION['id'] == $row['id'];
    }
    else
    return false;
  }

  public static function usernameCheck($username) {
    $db = \DB::get_instance();
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $row = $stmt->fetch();
    if (!$row)
    {
      return true;
    }
    else
    return false;
  }

  public static function emailCheck($email) {
    $db = \DB::get_instance();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    if (!$row)
    {
      return true;
    }
    else
    return false;
  }
}
