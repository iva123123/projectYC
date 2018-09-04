<?php
  class PostsController{
//   	public function upload(){
//   if (isset($_POST['submit'])) {
//    $file = $_FILES['file'];
//    $fileName = $_FILES['file']['name'];
//    $fileTmpName = $_FILES['file']['tmp_name'];
//    $fileSize = $_FILES['file']['size'];
//    $fileError = $_FILES['file']['error'];
//    $fileType = $_FILES['file']['type'];
//  }

//  $db = DB::getInstance();
//  $result = $db->prepare("INSERT INTO posts (file_name) VALUES (':file_name')");
//  $result->execute(array(':file_name'));
//  $fileExt = explode('.',$fileName);
//  $fileActualExt = strtolower(end($fileExt));

//  $allowed = array('jpg','jpeg','png','pdf');

//  if (in_array($fileActualExt , $allowed)){
//   if ($fileError === 0) {
//     if ($fileSize < 1000000) {
//       $fileNameNew = uniqid('', true).".".$fileActualExt;
//       $fileDestination ='uploads/'.$fileName;
//       move_uploaded_file($fileTmpName, $fileDestination);
//       header("location:index.php?uploadsuccess");
      
//     }
//     else{
//       echo "Your file is too big!";
//     }
//   }
//   else{
//     echo "There was an error uploading your file";
//   }
// }
// else {
//   echo "You can not upload this kind of file";
// }

// }

// public function showUploads(){
//   require_once('views/users/showUploads.php');
// }

public function events(){
   echo'test';
   $submit = true;
   $error_msg="";
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   echo'test1';
  if(empty($name)){
    $submit = false;
    $error_msg = "Your name is required";
  }

  $name = test_input($_POST["name"]);

   if(empty($body)){
    $submit = false;
    $error_msg = "Your description is required";
  }

   $body = test_input($_POST["body"]);

  if (isset($_POST['submit'])){

     $file = $_FILES['file'];
     $fileName = $_FILES['file']['name'];
     $fileTmpName = $_FILES['file']['tmp_name'];
     $fileSize = $_FILES['file']['size'];
     $fileError = $_FILES['file']['error'];
     $fileType = $_FILES['file']['type'];

     $fileExt = explode('.',$fileName);
     $fileActualExt = strtolower(end($fileExt));

     $allowed = array('jpg','jpeg','png');

     if (in_array($fileActualExt , $allowed)){
      if ($fileError === 0) {
        if ($fileSize < 1000000) {
          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination ='uploads/'.$fileName;
          move_uploaded_file($fileTmpName, $fileDestination);

         $db = DB::getInstance();
         $result = $db->prepare("INSERT INTO event (name, body, file) VALUES(:name, :body, :fileName");
         $result->execute(array(':name' => $name, ':body' => $body, ':fileName' => $fileName));
echo 'test2';
          header("location:index.php?controller=pages&action=error");
          
        }
      }
        else{
          echo "Your file is too big!";
        }
      }
      else{
        echo "There was an error uploading your file";
      }
    }
  }
}

 public function showEvents() {
      require_once('views/posts/showEvents.php');
    }

//   public function subscribe(){
//   if(isset($_POST['email'])){ 
//     $email = $_POST['email'];
//   }
//   $db = DB::getInstance();
//   $result = $db->prepare("INSERT INTO subscribe (email) VALUES (:email)");
//   $result->execute(array(':email' => $email));

//   header("location: index.php?controller=users&action=error");
// }

// public function showSubscribe(){
//   require_once('views/posts/showSubscribe.php');
// }
  }
?>