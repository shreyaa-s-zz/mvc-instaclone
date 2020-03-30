<?php

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/feed" => "\Controller\Feed",
    "/post" => "\Controller\Post",
));
