<?php

namespace Controller;
session_start();

class Post {
    public function get() {
        echo \View\Loader::make()->render("templates/post.twig");
    }

    public function post() {
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
        $name = $_FILES['file']['name'];
        $caption = $_POST['caption'];
        $target_dir = "assets/upload/";
        $path = $target_dir.$name;
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        // Check extension
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],$path);
            // Insert record
            \Model\Post::create($id,$username,$caption,$path);
            $status = true;
          header("Location: /home");
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
