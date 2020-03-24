<?php

namespace Controller;

class Login
{
    public static function post()
    {
      $password = $_POST["password"];
      $username = $_POST["username"];
      $passwordHash = hash('sha256',$password);
      if (\Controller\Login::loginCheck($username, $passwordHash)) {
          header("location: /feed");
      } else {
          echo "Invalid username or password";
      }

    }

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

}
