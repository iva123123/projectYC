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

        case 'admin':
        $controller = new admin();
        break;

        case 'remainder':
        $controller = new remainder();
        break;
      }

      $controller->{ $action }();
    }

    $controllers = array('pages' => ['home', 'error','aboutus', 'discovery', 'showPosts', 'showEvent' ],
                         'users' => ['login', 'showLogin', 'register', 'showRegister', 'logout', 'verify', 'subscribe', 'showSubscribe', 'addPost', 'editPost', 'deletePost', 'editProfile', 'showPost', 'editPage', 'profile','edit', 'going'],
                         'posts' => [ 'getPostsById', 'getPost'],
                         'admin' => ['event', 'getEventById', 'getEvent', 'deleteEvent', 'editEvent', 'update', 'editForm', 'showEvent'],
                         'remainder' => ['going']
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