<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
  <form action="index.php?controller=users&action=register" method="post">
  	<label>Name</label>
  	<input type="text" name="name">
  	<label>Email</label>
  	<input type="email" name="email">
  	<label>Password</label>
  	<input type="password" name="password">
  	<input type="submit" name="register">
  </form>
</body>
</html>

