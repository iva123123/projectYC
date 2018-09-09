<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class UsersController{

  public function showLogin(){

   require_once('views/users/showLogin.php');
 }

 public function login(){

  // if($this->isLoggedIn()){
  //   header("location: index.php?controller=posts&action=showProfile");
  // }

  $submit = true;
  $error_msg="";

  if(isset($_POST['email']) ){
    $email=$_POST['email'];
    $password = $_POST['password'];
  }  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
  }

  if(empty($email)){
   $submit = false;
   $error_msg="Your Email is required!";
 }

 else if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $email)){
   $submit=false;
   $error_msg="Invalid Email!";
 }
 else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) { 
  $submit=false;
  $error_msg="Not a valid email address";
}

$email = test_input($_POST["email"]);

if (empty($password)) {
  $submit=false;
  $error_msg="Password is required!";
}
else if (strlen($password)<6) {
  $submit=false;
  $error_msg="Password must contain 6 or more letters!"; 
}

$password =test_input($_POST["password"]);

if ($submit){

  $db = Db::getInstance();
  $result = $db->prepare("SELECT * FROM users WHERE email = ?");
  $result->execute([$email]);

  $user = $result->fetch(); 
   
   if($user['status'] == 'a'){ 
   $_SESSION["id"] = $user["id_u"];
     header("location: index.php?controller=admin&action=showEvent");
   }else{

  $_SESSION["id"] = $user["id_u"];
  header("location: index.php?controller=users&action=profile");
  
}
}else {
  header("location: index.php?error=$error_msg");
}
}

public function register(){

  if($this->isLoggedIn()){
    header("location: index.php?controller=pages&action=home");
  }

  $submit = true;
  $error_msg="";
  if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) ){
    $email=$_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
  }

  if(empty($name)){
    $submit = false;
    $error_msg = "Your name is required";
  }
  else
    if(!ctype_alpha($name)){
     $submit = false;
     $error_msg = "You must not add spaces, number or symbols to your name !";
   }
   else 
     if(strlen($name)<2){
       $submit = false;
       $error_msg = "Your name must be longer than 2 characters !";
     }

     function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);

      return $data;
    }

    $name = test_input($_POST["name"]);

    if(empty($email)){
     $submit = false;
     $error_msg="Your Email is required!";
   }
   else
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $email)){
      $submit=false;
      $error_msg="Invalid Email!";}
      else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) { 
        $submit=false;
        $error_msg="Not a valid email address";
      }

      $email = test_input($_POST["email"]);

      if (empty($password)) {
        $submit=false;
        $error_msg="Password is required!";
      }
      else if (strlen($password)<6) {
        $submit=false;
        $error_msg="Password must contain 6 or more letters!"; 
      }

      $password =test_input($_POST["password"]);
      $password=password_hash($password,PASSWORD_DEFAULT);

      if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){
    // $result= $db->prepare("SELECT email FROM users WHERE email=?");
    // $result->execute(array(':email' => $email));
    // $user = $result->fetch();
    // if ($result->fetchColumn()>0) {
    //   $error_msg="This email address is already taken!";
    // }else{
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $conf_code='qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789!()';
        $conf_code=str_shuffle($conf_code);
        $conf_code = substr($conf_code,0,12);


        $db = DB::getInstance();

        $result = $db->prepare("INSERT INTO users(name,email,password, active, conf_code) VALUES(:name,:email,:password, 0, :conf_code)");

        $result->execute(array(':name' => $name, ':email' => $email, ':password' => $password, ':conf_code' => $conf_code)); 
        
        if($submit){ 
         require 'vendor/autoload.php';

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'yourclique1@gmail.com';    // SMTP username
                $mail->Password = 'Yourclique1234';                      // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('yourclique1@gmail.com','ExitFestival');
                $mail->addAddress($email);     // Add a recipient              


                //Content
                $mail->isHTML(false);                                  // Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = 'Thank you for signing up!

                Please click this link to activate your account:

                http://localhost/Taleas/verify.php?email='.$email.'&hash='.$_SESSION['hash'];    

                $mail->send();
                echo 'Message has been sent';
              } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
              }

              header("location: index.php?controller=users&action=profile");
            }
          }else {
           header("location: index.php?error=$error_msg");
         }
       }

      public function findUserbyEmail(){
        $db = DB::getInstance();
        $result = $db->prepare("SELECT email FROM users WHERE email = :email");
        $result->execute([$email]);
        $user = $result->fetch();
        return $user['id'];
      }

      public function showRegister(){
       require_once('views/users/showRegister.php');
      }

     public function subscribe(){

      if(isset($_POST["email"])){ 

        $email = $_POST["email"];

        $name = '';

        $db = DB::getInstance();

        $result = $db->prepare("INSERT INTO subscribe (email, name) VALUES (:email, :name)");
        $result->execute(array(':email' => $email, ':name' => $name));

        header("location: index.php?controller=pages&action=error");
      }
    } 

    public function showSubscribe(){
      require_once('views/users/showSubscribe.php');
    }

    public function verify(){

      $email=$_GET["email"];
      $code_conf=$_GET["conf_code"];
      $db = DB::getInstance();
      $result= $db->preprare("SELECT * FROM users WHERE email=? AND conf_code = ?");
      $result=execute(array(':conf_code' => $conf_code, ':email' => $email));
      if ($result->fetchColumn() > 0){
       $update= $db->prepare("UPDATE users SET active='1' WHERE email=? AND conf_code = ?");
       $update->execute(array(':conf_code' => $conf_code, ':email' => $email));

     }
   }

   public function deletePost(){

    if(isset($_POST['id_p']))
    {

      $db = DB::getInstance();
      $result_delete=$db->prepare('DELETE FROM posts WHERE id_p =:id_p');
      $result_delete->bindParam(':id_p', $_POST['id_p']);
      if($result_delete->execute()){
       header("location:index.php?controller=users&action=profile");
     }
   }
 }

 public function addPost(){

  if(isset($_POST['btn-add']))
  {

    $postname=$_POST['postname'];
    $body = $_POST['body'];


    $images=$_FILES['profile']['name'];
    $tmp_dir=$_FILES['profile']['tmp_name'];
    $imageSize=$_FILES['profile']['size'];

    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $image=rand(1000, 1000000).".".$imgExt;

    move_uploaded_file($tmp_dir, $upload_dir.$image);
    $db = DB::getInstance();
    $query = $db->prepare('SELECT * FROM users WHERE id_u = :id_u AND email = :email'); 
    $query->bindParam(':id_u', $_POST['id_u']);
    $query->bindParam('email', $_POST['email']);
     $query->execute();
// echo"hi"; die;
//     if ($query->fetchColumn() > 0){
    $result=$db->prepare('INSERT INTO posts(user_id, image, body, postname) VALUES (:user_id, :image, :body, :postname)');
    $result->execute(array('user_id' => $user_id, ':image' => $image, ':postname' => $postname, ':body' => $body));

    header("location:index.php?controller=users&action=profile");
  
  }
}



public function showPost(){
  $db = DB::getInstance();
  $result=$db->prepare('SELECT * FROM posts ORDER BY id_p DESC');
  $result->execute();
  $user = $result->fetchAll();
  require_once("views/posts/showPost.php");
}

public function editPost(){


  if(isset($_POST["id"]))
  {

    $id=$_POST["id"];

  }
  $db = DB::getInstance();
  $result=$db->prepare('UPDATE posts SET edit = 1 WHERE id_p = ?');
  $result->execute([$id]);

  $result=$db->prepare('SELECT * FROM posts WHERE id_p=?');
  $result->execute([$id]);
  $edit = $result->fetch();

  require_once('views/users/editPage.php');

  
}
public function edit(){


  $db = DB::getInstance();

  if(isset($_POST['postname'])){
    $postname=$_POST['postname'];
  }
  if(isset($_POST['body'])){
    $body=$_POST['body'];
  }
  if(isset($_POST['id'])){
    $id=$_POST['id'];
  }


  $images=$_FILES['profile']['name'];
  $tmp_dir=$_FILES['profile']['tmp_name'];
  $imageSize=$_FILES['profile']['size'];

  $upload_dir='uploads/';
  $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
  $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
  $image=rand(1000, 1000000).".".$imgExt;

  move_uploaded_file($tmp_dir, $upload_dir.$image);

  $result=$db->prepare('UPDATE posts SET edit = 0 WHERE id_p = ?');
  $result->execute([$id]);

  $result=$db->prepare('UPDATE posts SET postname = :postname WHERE id_p = :id');
  $result->execute(array(':postname'=>$postname, ':id'=>$id));

  $result=$db->prepare('UPDATE posts SET body = :body WHERE id_p = :id');
  $result->execute(array(':body'=>$body, ':id'=>$id));

  $result=$db->prepare('UPDATE posts SET image = :image WHERE id_p = :id');
  $result->execute(array(':image'=>$image, ':id'=>$id));


  header("Location: index.php?controller=users&action=profile");
  
}

public function profile(){
  if(isset($_SESSION["id"]))
  {
    require_once('views/users/profile.php');
  }
  else {
    echo "<script>alert('Nuk je loguar'); </script>";
    header("Location: index.php?controller=pages&action=home");
  }
}
public function editPage(){

  require_once('views/users/editPage.php');
}
public function createUserSession($user){
  $_SESSION['user_id'] = $user->id;
  $_SESSION['user_email'] = $user->email; 
  $_SESSION['user_name'] = $user->name;
  redirect('profile');
}

public function logout(){
  // unset($_SESSION['user_id']);
  // unset($_SESSION['user_email']);
  // unset($_SESSION['user_name']);

  session_destroy();
  header('Location: index.php?controller=pages&action=home');
}

public function isLoggedIn(){
  if(isset($_SESSION["id"])){
    return true;
  } else {
    return false;
  }
}

}

?>