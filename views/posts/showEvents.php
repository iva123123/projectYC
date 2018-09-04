<section id="event" class="py-5 mt-5">
<div class="card-body">
                  <div class="row" id="collapseOne">
                    <div class="col-md-4 mb-4 text-center">
                      <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#Mymodal1" ><h3>Create</h3></button>
                      <div class="modal" id="Mymodal1" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <div class="modal-header text-center join">
                              Create
                            </div>
                             
                            <div class="modal-body">
                              <form class=" text-center" action="index.php?controller=posts&action=events" method="post" enctype="multipart/form-data">
                                    <?php  $name = $body ="";
                                    $nameErr = $bodyErr = "";?>

                                <div class="form-group">
                                  <div class="input-group mb-3 input-group-sm">
                                    <label>Event Name</label>
                                    <input type="text" name="name"  class="form-control " placeholder="Add a short,clear name">
                                    <span class="error"> <?php echo $nameErr;?></span>
                                  </div>

                                  <div class="input-group mb-3 input-group-sm ">
                                    <label>Description</label>
                                    <textarea rows="4" cols="46"  placeholder="Tell people more about the event"></textarea>
                                    <span class="error"> <?php echo $bodyErr;?></span>
                                   <br>                                   
                                 </div>
                               </div>
                               <div>
                                <label for="post" >Add Photos</label>
                                <input type="file" name="file" id="image">
                              </div>
                             <input type="submit" value="Create" class="btn btn-primary btn-block">
                           </form>
                         </div>
                       </div>
                     </div> 
                   </div>
                 </div>
              <div class="row">
                <div class="col">
                  <div class="card-columns">
                    <div class="card">
                      <img src="img/e2.jpg" alt="" class="img-fluid card-img-top">
                      <div class="card-body mb-4">
                        <h4 class="card-title">Turtle Fest </h4>
                        <small class="text-muted">Drymades</small><br>
                        <small class="text-muted">6/7/8 July</small>
                        <hr>
                        <div>
                        <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#Mymodal3">Going</button>
                        <div class="modal" id="Mymodal3" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content ">
                        <div class="modal-body">
                          <form class=" text-center" action="index.php?controller=users&action=subscribe" method="post">

                              <div class="input-group mb-3 input-group-sm ">
                                <div class="input-group-prepend">
                                  <span class="input-group-text bg-primary ">
                                   <i class="material-icons">&#xe554;</i>
                                 </span>
                                </div>
                               <input type="email" name="email"class="form-control" placeholder="Enter your email..."><br>
                              </div>                          
                           <input type="submit" value="Subscribe" class="btn btn-primary btn-block">                        
                       </form>
                     </div>
                   </div>
                 </div>
               </div>
                        <a href=""><button class="btn btn-primary float-right" type="button">Buy</button></a>
                        </div>
                      </div>
                    </div>

                    <div class="card pt-4 pb-1">
                      <img src="img/e3.jpg" alt="" class="img-fluid card-img-top">
                      <div class="card-body mb-4">
                        <h4 class="card-title">Turtle Fest </h4>
                        <small class="text-muted">Drymades</small><br>
                        <small class="text-muted">6/7/8 July</small>
                        <hr>
                        <a href=""><button class="btn btn-primary float-right" type="button">Buy</button></a>
                      </div>
                    </div>

                    <div class="card pt-5 pb-3">
                      <img src="img/e4.jpg" alt="" class="img-fluid card-img-top">
                      <div class="card-body mb-4">
                        <h4 class="card-title">Turtle Fest </h4>
                        <small class="text-muted">Drymades</small><br>
                        <small class="text-muted">6/7/8 July</small>
                        <hr>
                        <a href=""><button class="btn btn-primary float-right" type="button">Buy</button></a>
                      </div>
                    </div>
                  </div>
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