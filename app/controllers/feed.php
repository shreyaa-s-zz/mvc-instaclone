<?php

namespace Controller;

session_start();
class Feed
{
    public static function get()
    {

        // if (isset($_SESSION['id'])) {
            echo \View\Loader::make()->render("templates/feed.twig", array(
                "posts" => \Model\Feed::get_all(),
                "user" => \Model\Feed::get_user(),
                "comments" => \Model\Feed::get_comments()
            ));
        // } else {
        //     echo "Unauthorised Access!";
        //   header("location: /home");
        // }
    }
}
