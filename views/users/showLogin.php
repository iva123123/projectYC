<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
  <form action="index.php?controller=users&action=login" method="post">
  	<label>Email</label>
  	<input type="email" name="email">
  	<label>Password</label>
  	<input type="password" name="password">
  	<input type="submit" name="login">
  </form>
</body>
</html>