<?php

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Login",
    "/home" => "\Controller\Home",
    "/post" => "\Controller\Post",
    "/signup" => "\Controller\Signup",
    "/explore" => "\Controller\Explore",
    // "/post/:id" => "\Controller\Post\(:id)",
    "/addComment" => "\Controller\Comment",
    "/like" => "\Controller\Like"
));
