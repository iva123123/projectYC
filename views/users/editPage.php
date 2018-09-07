<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>YourClique</title>
</head>
<style type="text/css">
	.edit-form img {
		width: 150px;
		height: 100px;
	}
</style>
<body>
	<?php
      if(isset($_GET['id_p']) && !empty($_GET['id_p']))
  {
    $db = DB::getInstance();
    $id_p=$_GET[ 'id_p'];

    $result=$db->prepare('SELECT * FROM posts WHERE id_p=:id_p');
    $result->execute(array(':id_p'=>$id_p));
    $edit_row=$result->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
  }else 

  {
    header("Location: index.php?controller=users&action=profile");
  }

  if(isset($_POST['btn-save'])){
    $db = DB::getInstance();

    $postname=$_POST['postname'];
    $body=$_POST['body'];

    $images=$_FILES['profile']['name'];
    $tmp_dir=$_FILES['profile']['tmp_name'];
    $imageSize=$_FILES['profile']['size'];

    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $image=rand(1000, 1000000).".".$imgExt;
    unlink($upload_dir.$edit_row['image']);
    move_uploaded_file($tmp_dir, $upload_dir.$image);

    $result=$db->prepare('UPDATE posts SET postname=:postname, body=:body image=:image WHERE id_p=:id_p');
    $result->execute(array(':id_p' => $id_p, ':body' => $body, ':image' => $image, ':postname' => $postname));
    header("Location: index.php?controller=users&action=profile.php");
  }
	?>
	 
	<div class="container">
		<div class="edit-form">
			<h1 class="text-center">Update your post</h1>
			<form method="post" enctype="multipart/form-data" >
				<label>Post Name</label>
				<input type="text" name="postname" class="form-control" value="<?php echo $postname; ?>">
				<label>Description</label>
				<input type="text" name="body" class="form-control" value="<?php echo $body; ?>">
				<label>Picture Post</label>
				<img src="uploads/<?php echo $image; ?>" class="img-rounded">
				<input type="file" name="profile" class="form-control" required="" accept="*/image">
				<button type="submit" name="btn-save">Update </button>
				
			</form>
		</div>
		<hr style="border-top: 2px red solid;">
	</div>	
<!-- end form insert -->

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>