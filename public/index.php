<?php

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Login",
    "/home" => "\Controller\Home",
    "/post" => "\Controller\Post",
    "/signup" => "\Controller\Signup",
    "/explore" => "\Controller\Home::get_explore",
    "/post/:id" => "\Controller\Post\(:id)"
));
