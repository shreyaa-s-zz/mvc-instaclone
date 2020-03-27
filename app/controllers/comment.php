<?php

namespace Controller;
session_start();

class Comment {
  public function addComment() {
    $userId = $_SESSION['id'];
    $username = $_SESSION['username'];
    $commentNote = $_POST['commentNote'];
    $postId = $_POST['postId'];
    if(\Model\Post::addComment($postId,$userId,$username,$commentNote))
    {
      return true;
    }
    else
      return false;
  }
}
