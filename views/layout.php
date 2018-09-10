  <DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>YourClique</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="home.css">
      <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
      crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

    </head>

    <body>
      <header>
        <nav class="navbar navbar-expand-sm  fixed-top  navbar-light transparent">
         <div class="container">
           <a href="index.php?controller=pages&action=home" class="navbar-brand">YourClique</a>
           <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarCollapse">
             <ul class="navbar-nav ml-auto" style="margin-right:-40px;">
               <li class="nav-item active">
                 <a href="discover.html" class="nav-link">Discover</a>
               </li>
               <li class="nav-item">
                 <a href="index.php?controller=pages&action=aboutus" class="nav-link">About Us</a>
               </li
               <li class="nav-item">
                 <a href="blog.html" class="nav-link">Blog</a>
               </li>
                <?php if($action == 'profile') : ?>
               <li class="nav-item">
                <a class="nav-link" href="index.php?controller=users&action=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
               </li>
                <?php endif; ?>
                 <?php if($controller == 'admin') : ?>
               <li class="nav-item">
                <a class="nav-link" href="index.php?controller=users&action=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
               </li>
                <?php endif; ?>
             </ul>
           </div>
         </div>
       </nav>
     </header>

     <?php require_once('routes.php'); ?>

     <footer id="main-footer" class="text-center p-4">
      <div class="container">
        <div class="row">
          <div class="col">
            <p>Copyright &copy;
              <span id="year"></span>YourClique</p>
              <div class="col">
                <div class="container p-1">
                  <h6>Ways to pay</h6>
                  <a href="#"><img src="./../img/paypal.png" style="width: 70px;"></a>
                  <a href="#"><img src="./../img/visa1.jpg" style="width: 70px;"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
        <script type="text/javascript">

            //carousel
            $(".hbox").mouseover(function(){
              $(this).css("background", "rgba(0, 0, 0, 0.3)");
            }); 
            $(".hbox").mouseout(function(){
              $(this).css("background", "rgba(0, 0, 0, 0.7)");
            });



            $('#des1').mouseover(function () {
              $('#des1').css("font-size", "60px");
            });
            $('#des1').mouseout(function () {
              $('#des1').css("font-size", "40px");
            });
            

            $('.carousel').carousel({
              pause: 'hover'
            });

        //vidio
          // Video Play
          $(function () {
              // Auto play modal video
              $(".video").click(function () {
                var theModal = $(this).data("target"),
                videoSRC = $(this).attr("data-video"),
                videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
                $(theModal + ' iframe').attr('src', videoSRCauto);
                $(theModal + ' button.close').click(function () {
                  $(theModal + ' iframe').attr('src', videoSRC);
                });
              });
            });
            //lightbox
            $(document).on('click', '[data-toggle="lightbox"]', function (event) {
              event.preventDefault();
              $(this).ekkoLightbox();
            });
            $('#year').text(new Date().getFullYear());


          </script>
      </body>
        </html>
