  <?php


    function call($controller, $action) {
      require_once('controllers/' . $controller . 'controller.php');

      switch($controller) 
      {
        case 'pages':
        $controller = new PagesController();
        break;

        case 'users':
        $controller = new UsersController();
        break;

        case 'posts':
        $controller = new PostsController();
        break;
      }

      $controller->{ $action }();
    }

    $controllers = array('pages' => ['home', 'error','aboutus', 'discovery', 'showPosts','showEvent' ],
                         'users' => ['login', 'showLogin', 'register', 'showRegister', 'logout', 'verify', 'subscribe', 'showSubscribe', 'addPost', 'editPost', 'deletePost', 'editProfile', 'showPost', 'editPage', 'profile','edit'],
                         'posts' => [ 'getPostsById', 'getPost'],
                         'admin' => ['event', 'getEventById', 'getEvent', 'deleteEvent', 'editEvent', 'update', 'editForm', 'showEvent']
                       );

    if (array_key_exists($controller, $controllers)) {
      if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
      } else {
        call('pages', 'error');
      }
    } else {
      call('pages', 'error');
    }
  ?>