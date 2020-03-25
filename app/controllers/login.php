<?php

namespace Controller;

class Login {
    public function get() {
        echo \View\Loader::make()->render("templates/login.twig");
    }

    public function post() {
      $password = $_POST["password"];
      $username = $_POST["username"];
      $passwordHash = hash('sha256',$password);
      if (\Model\Check::loginCheck($username, $passwordHash)) {
        echo \View\Loader::make()->render("templates/home.twig", array(
            "posts" => \Model\Post::get_feed(),
            "loggedin" => true
        ));
      } else {
        echo \View\Loader::make()->render("templates/login.twig", array(
            "loggedin" => false
        ));
      }
    }

}


