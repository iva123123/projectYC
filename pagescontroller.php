<?php

  class PagesController {
    public function home() {

      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }

     public function aboutus() {
      require_once('views/pages/aboutus.php');
    }

    public function showPosts(){
      require_once('views/posts/showPosts.php');
    }

    public function showEvent(){
      require_once('views/posts/showEvent.php');
    }

  }
?>