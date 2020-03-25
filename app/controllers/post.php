<?php

namespace Controller;

class Post {
    public function get() {
        echo \View\Loader::make()->render("templates/post.twig");
    }

    public function post() {
        $name = $_FILES['file']['name'];
        $caption = $_POST['caption'];
        $target_dir = "/assets/upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
            // Insert record
            $path = $target_dir.$name;
            \Model\Post::create($path,$caption);
            $status = true;
        }
        else
          $status = false;

          echo \View\Loader::make()->render("templates/home.twig", array(
              "posts" => \Model\Post::get_feed(),
              "posted" => $status,
          ));
    }

    public function like($id) {
        if(\Model\Post::like($id)) {
            return true;
        }
        else
        return false;
    }
}
?>
