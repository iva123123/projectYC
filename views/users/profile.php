<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>YourClique</title>
</head>
<body>

	<div class="container">
		<div class="add-form">
			<h1 class="text-center">Your Posts</h1>
			<form method="post" enctype="multipart/form-data" action="index.php?controller=users&action=addPost">
				<label>Post Name</label>
				<input type="text" name="postname" class="form-control" required="">
				<label>Description</label>
				<input type="text" name="body" class="form-control" required="">
				<label>Picture Post</label>
				<input type="file" name="profile" class="form-control" required="" accept="*/image">
				<button type="submit" name="btn-add">Add </button>
				
			</form>
		</div>
		<hr style="border-top: 2px red solid;">
	</div>	
	<!-- end form insert -->
	<!-- view form -->
<div  class="container">
	<div class="view-form">
		<div class="row">
		<?php 
		$db = DB::getInstance();
			$result=$db->prepare('SELECT * FROM posts ORDER BY id_p DESC');
				 $result->execute();
				$posts = $result->fetchALL();
				

				// if($result->rowCount()>0)
				// {
				// 	while($row=$result->fetch(PDO::FETCH_ASSOC))
				// 	{
				// 		extract($row);
						?>
			<?php foreach ($posts as $key => $post) { ?>
			
			<div id="$posts[$key]["id_p"]" class="col-sm-3">
			<p ><?php echo $posts[$key]["body"] ?></p>
			<img src="uploads/<?php echo $posts[$key]["image"] ?>"><br><br>
			<form method="POST" action="index.php?controller=users&action=editPost">
				<input type="hidden" id="id" name="id"  value="<?php echo $posts[$key]["id_p"] ?>" >
			<input type="submit" class="btn btn-info" value="Edit"  title="click for edit" onlick="return confirm('Sure to edit this record')"><span class="glyphicon glyphicone-edit"></span></form>
		     

		    
			
			<form method="POST" action="index.php?controller=users&action=deletePost">
				<input type="hidden" id="id_p" name="id_p"  value="<?php echo $posts[$key]["id_p"] ?>" >
			
		     <input type="submit"s class="btn btn-danger" value="Delete"  onclick="return confirm('Sure to delete this record?')"> 	</form>


			</div>

			<?php 

			}
			
			?>
		</div>
	</div>
</div>
	<!-- end view form -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
