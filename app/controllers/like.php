<?php

namespace Controller;
session_start();

class Like {
  public function post() {
          $id = $_POST['$postId'];
          $userId = $_SESSION['id'];
          if(\Model\Post::like($id,$userId)) {
              return true;
          }
          else
          return false;
      }
}
