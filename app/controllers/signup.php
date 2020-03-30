<?php

namespace Controller;


class Signup
{
    public static function get()
    {
      echo \View\Loader::make()->render("templates/signup.twig");
    }

    public static function post()
    {
      // Credentials received through post
      $name = $_POST["name"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $username = $_POST["username"];
      $passwordHash = hash('sha256',$password);
      // Checking the credentials
      if(\Model\Check::usernameCheck($username)) {
        if(\Model\Check::emailCheck($email)) {
          \Model\User::create_user($name,$username,$email,$passwordHash);
          header("Location: /home");
        }
        else {
          echo \View\Loader::make()->render("templates/signup.twig", array(
            "error" => "email already exists",
        ));}
      }
      else {
        echo \View\Loader::make()->render("templates/signup.twig", array(
          "error" => "username already exists",
      ));}
    }
}
