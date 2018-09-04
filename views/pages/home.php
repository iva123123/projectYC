<section id="showcase">
         <div id="myCarousel" class="carousel slide" data-ride="carousel" >
           <div class="carousel-inner">
             <div class="carousel-item carousel-image-1 active">
               <div class="container">
                 <div class="carousel-caption d-none d-sm-block text-right mb-5">
                   <h1 class="display-3">Berat</h1>

                   <a href="#" class="btn btn-primary btn-lg">Sign Up Now</a>
                 </div>
               </div>
             </div>

             <div class="carousel-item carousel-image-2">
               <div class="container">
                 <div class="carousel-caption d-none d-sm-block mb-5">
                   <h1 class="display-3">Pogradec</h1>
                   <a href="#" class="btn btn-primary btn-lg">Discover</a>
                 </div>
               </div>
             </div>

             <div class="carousel-item carousel-image-3">
               <div class="container">
                 <div class="carousel-caption d-none d-sm-block  text-left mb-5">
                   <h1 class="display-3" style="color: black;">Theth</h1>
                   <a href="#" class="btn btn-primary btn-lg">Subscribe</a>
                 </div>
               </div>
             </div>
           </div>

           <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
             <span class="carousel-control-prev-icon"></span>
           </a>

           <a href="#myCarousel" data-slide="next" class="carousel-control-next">
             <span class="carousel-control-next-icon"></span>
           </a>
         </div>
         <section  class="p-5">
          <div class="container" >
            <div class="row mb-4" >

              <div class="col-md-4" >
                <a href="index.php?controller=posts&action=showEvents" id="box">
                  <div class="card  text-center" id="box" >
                    <div class="card-body dark-box hbox"  >
                      <i class="fas fa fa-music fa-3x"></i>
                      <h3>Festivals</h3>
                      Get your ticket and Have some Fun !
                    </div>
                  </div>
                </div></a>
                <div class="col-md-4">
                  <a href="" id="box">
                    <div class="card  text-center" id="box" >
                      <div class="card-body dark-box hbox">
                        <i class="fas fa fa-paint-brush fa-3x"></i>
                        <h3>Art</h3>
                        Show your Art and be more colorful !
                      </div>
                    </div>
                  </div>
                </a> 
                <div class="col-md-4">
                  <a href="" id="box">
                    <div class="card  text-white text-center" id="box"  >
                      <div class="card-body dark-box hbox">
                        <i class="fas fa-comments fa-3x"></i>
                        <h3>Travel</h3>
                        Share your experience and try new things!
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </section>
          <section id="" class="py-3">
            <div class="container">
            <div id="accordion">
             <div class="card">
               <div class="card-header text-center text-capitalize ">
                 <a class="card-link join" data-toggle="collapse" href="#collapseOne">
                   Join Us
                 </a>
               </div>
               <div id="collapseOne" class="collapse " data-parent="#accordion">

                 <div class="card-body">
                  <div class="row" id="collapseOne">


                    <div class="col-md-4 mb-4 text-center">
                      <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#Mymodal1" ><h3>SignUp</h3></button>
                      <div class="modal" id="Mymodal1" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <div class="modal-header text-center join">
                              SignUp
                            </div>

                            <div class="modal-body">
                              <form class=" text-center" action="index.php?controller=users&action=register" method="post">
                                <div class="form-group">
                                  <div class="input-group mb-3 input-group-sm">
                                    <div class="input-group-prepend ">
                                      <span class="input-group-text bg-primary ">
                                        <i class="fas fa-user"></i>

                                      </span>
                                    </div>
                                    <input type="text" name="name"  class="form-control " placeholder=" Enter your name..." required pattern="[A-Za-z\s]+" maxlength="30" minlength="2"/>
                                  </div>

                                  <div class="input-group mb-3 input-group-sm ">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text bg-primary ">
                                       <i class="material-icons">&#xe554;</i>
                                     </span>
                                   </div>
                                   
                                   <input type="email" name="email"class="form-control" placeholder="Enter your email..." required><br>
                                   
                                 </div>
                                  <div class="input-group mb-3 input-group-sm ">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text bg-primary ">
                                       <i class="material-icons">&#xe554;</i>
                                     </span>
                                   </div>
                                   
                                   <input type="password" name="password"class="form-control" placeholder="Enter your password..." title="Must contain one number,one uppercase and lowercase letter and 6 or more characters"  pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$" required><br>
                                   
                                 </div>

                               </div>
                             <input type="submit" value="SignUp" class="btn btn-primary btn-block">
                           </form>
                         </div>

                       </div>
                     </div> 
                   </div>
                 </div>

                 <div class="col-md-4 mb-4 text-center">
                  <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#Mymodal2" ><h3>Login</h3></button>
                  <div class="modal" id="Mymodal2" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <div class="modal-header join text-center">
                          Login
                        </div>

                        <div class="modal-body">
                          <form class=" text-center" action="index.php?controller=users&action=login" method="post">
                            <div class="form-group">
                              <div class="input-group mb-3 input-group-sm">
                                <div class="input-group-prepend ">
                                  <span class="input-group-text bg-primary ">
                                    <i class="material-icons">&#xe554;</i>

                                  </span>
                                </div>
                                <input type="email" name="email"  class="form-control " placeholder=" Enter your email..." required>
                              </div>

                              <div class="input-group mb-3 input-group-sm ">
                                <div class="input-group-prepend">
                                  <span class="input-group-text bg-primary ">
                                   <i class="material-icons">&#xe554;</i>
                                 </span>
                               </div>

                               <input type="password" name="password"class="form-control" placeholder="Enter your password..." title="Must contain one number,one uppercase and lowercase letter and 6 or more characters"  pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$" required><br>

                             </div>

                           </div>
                           <div class="row">
					         <div class="col-xs-9 col-sm-9 col-md-9">
						       <a href='reset.php'>Forgot your Password?</a>
					         </div>
				           </div>
                           <input type="submit" value="Login" class="btn btn-primary btn-block">
                         </form>
                       </div>

                     </div>
                   </div> 
                 </div>
               </div>
           </div> 
         </div>
       </div>
     </div>
   </div>
 </section>
 <br><br>
 <section id="video-play">
  <div class="dark-overlay">
    <div class="row">
      <div class="col">
        <div class="container p-5">
          <a href="#" class="video" data-video="https://www.youtube.com/embed/JaB1wdm9pTo" data-toggle="modal" data-target="#videoModal">
            <i class="fas fa-play fa-3x"></i>
          </a>
          <h1>Festival</h1>
          <a href=""><p>Get your ticket Now </p></a>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="videoModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
        <iframe src="" frameborder="0" height="350" width="100%" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

<section id="gallery" class="py-5">
 <div class="container">
  <a href="" id="des"><h1 class="text-center" id="des1">Discover</h1></a>
  <p class="text-center">Photo Gallery !</p>
  <div class="row mb-4">
   <div class="col-md-4">
     <a href="img/c10.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="560"
     data-width="560">
     <img src="img/c10.jpg" alt="" class="img-fluid img-thumbnail">
   </a>
 </div>	
 <div class="col-md-4">
   <a href="img/c5.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="560"
   data-width="560">
   <img src="img/c5.jpg" alt="" class="img-thumbnail img-fluid">
 </a>
</div>
<div class="col-md-4">
 <a href="img/c22.jpg"  data-toggle="lightbox" data-gallery="img-gallery" data-height="560"
 data-width="560">
 <img src="img/c22.jpg" alt="" class="img-fluid img-thumbnail" >
</a>
</div>	
</div>
</div>
</section>

<?php 
   if(isset($_GET["error"]) && $_GET["error"]!=""){
    ?> 
    <script>
      alert("<?php echo $_GET["error"]; ?>");
    </script>
    <?php
   }
  ?>