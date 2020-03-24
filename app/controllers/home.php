<?php

namespace Controller;

class Home {
    public function get() {
        echo \View\Loader::make()->render("templates/home.twig", array(
            "posts" => \Model\Post::get_all(),
            "user" => \Model\User::get_user(),
            "comments" => \Model\Post::get_comments()
        ));
    }
}
