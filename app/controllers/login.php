<?php

namespace Controller;
session_start();

class Login {
    public function get() {
        echo \View\Loader::make()->render("templates/login.twig");
    }

    public function post() {
      $password = $_POST["password"];
      $username = $_POST["username"];
      $passwordHash = hash('sha256',$password);
      if (\Model\Check::loginCheck($username, $passwordHash)) {
        $_SESSION['username'] = $username;
        header("Location: /home");
      } else {
        echo \View\Loader::make()->render("templates/login.twig", array(
          "error" => true
      ));
      }
    }

}


