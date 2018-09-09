<!-- <br><br>

<div class="container">
		<div class="view-form">
			<div class="row">
				<div class="col-sm-3">
					<p> <?php //echo $postname ?></p>
					<img src="uploads/<?php //echo $row['image']?>"><br><br>
				</div>
			</div>
       </div>
   </div> -->

   <div class="container">
   	<div class="view-form">
   		<div class="row">
   			<?php 
   			$db = DB::getInstance();
   			$result=$db->prepare('SELECT * FROM posts ORDER BY id_p DESC');
   			$result->execute();
   			$users = $result->fetchAll();
   			?> 
   			<?php foreach ($users as $key => $user) { ?>
   			<div class="col-sm-3">
   				<p><?php echo $users[$key]["postname"] ?></p>
   				<p><?php echo $users[$key]["body"] ?></p>
   				<p><?php echo $users[$key]["email"] ?></p>
   				<img src="uploads/<?php echo $users[$key]["image"]?>"><br><br>

   				<a href=""><button class="btn btn-primary float-right" type="button">Buy</button></a>

   			</div>

   			<?php 
   		}
   			?>
   		</div>
   	</div>
   </div>