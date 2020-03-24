<?php

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Login",
    "/feed" => "\Controller\Feed",
    "/post" => "\Controller\Post",
    "/signup" => "\Controller\Signup",
));
