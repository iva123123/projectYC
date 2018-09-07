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
<div class="container">
	<div class="view-form">
		<div class="row">
		<?php 
		$db = DB::getInstance();
			$result=$db->prepare('SELECT * FROM posts ORDER BY id_p DESC');
				$result->execute();
				if($result->rowCount()>0)
				{
					while($row=$result->fetch(PDO::FETCH_ASSOC))
					{
						extract($row);
						?>
			<div class="col-sm-3">
			<p><?php echo $body ?></p>
			<img src="uploads/<?php echo $row['image']?>"><br><br>
			<a class="btn btn-info" href="editPage.php?id_u=<?php echo $row['id_u']?>" title="click for edit" onlick="return confirm('Sure to edit this record')"><span class="glyphicon glyphicone-edit"></span>Edit</a>
			<a class="btn btn-danger" href="?id_p=<?php echo $row['id_p']?>" title="click for delete" onclick="return confirm('Sure to delete this record?')">Delete</a>
			
			</div>

			<?php 

				}
			}
			?>
		</div>
	</div>
</div>
	<!-- end view form -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
