<?php

namespace Controller;

class Followers {
    public function get($user_id) {
        echo \View\Loader::make()->render("templates/followers.twig", array(
            "followers" => \Model\Followers::getFeed_followers($user_id),
        ));
    }
}
