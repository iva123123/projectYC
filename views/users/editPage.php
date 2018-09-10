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
	
	<div class="container">
		<div class="edit-form">
			<h1 class="text-center">Update your post</h1>
			<form method="post" enctype="multipart/form-data" action="index.php?controller=users&action=edit">
				<label>Post Name</label>
        <input type="hidden" name="id" value="<?php echo $edit["id_p"]; ?>">
        <input type="text" name="postname" class="form-control" value="<?php echo $edit["postname"]; ?>">
        <label>Description</label>
        <input type="text" name="body" class="form-control" value="<?php echo $edit["body"]; ?>" >
        <label>Picture Post</label>
        <img src="uploads/<?php echo $edit["image"] ?>" class="img-rounded">
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