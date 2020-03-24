<?php

namespace Controller;

class Post {
    public function get($id) {
        echo \View\Loader::make()->render("templates/post.twig", array(
            "posts" => \Model\Post::find($id),
        ));
    }
}
