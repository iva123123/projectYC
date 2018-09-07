<?php
  class PostsController{



    public function __construct(){
    if(!isset($_SESSION['user_id'])){
      header("location:index.php?controller=users&action=profile");
    }
    }
    
    public function getPost(){
        $db = DB::getInstance();
      $result= $db->prepare("SELECT *, 
                        posts.id_p as postId, 
                        users.id_u as userId
                        FROM posts 
                        INNER JOIN users 
                        ON posts.user_id = users.id_u
                        ORDER BY posts.created_at DESC;");

      $results ->execute();
    }

    public function getPostsById(){
      $db = DB::getInstance();

      $result = $db->prepare("SELECT * FROM posts  WHERE id_p = :id_p ");
      $result = $db->execute(array(':id_p' => $id_p));
      if($result->rowCount()>0){
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
         extract($row);
         header("location:index.php?controller=posts&action=showPosts");
        }
      }
    }

    public function getEvent(){
        $db = DB::getInstance();
      $result= $db->prepare("SELECT *, 
                        event.id_e as eventId, 
                        users.id_u as userId
                        FROM event 
                        INNER JOIN users 
                        ON event.user_id = users.id_u
                        ORDER BY event.created_at DESC;");

      $results ->execute();
    }

   public function getEventById(){
      $db = DB::getInstance();

      $result = $db->prepare("SELECT * FROM event  WHERE id_e = :id_e ");
      $result = $db->execute(array(':id_e' => $id_e));
      if($result->rowCount()>0){
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
         extract($row);
         header("location:index.php?controller=posts&action=showEvent");
        }
      }
    } 

  public function events(){

  if(isset($_POST['btn-add']))
  {

    $name=$_POST['name'];
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
    $result=$db->prepare('INSERT INTO event(image, body, name) VALUES (:image, :body, :name)');
    $result->execute(array(':image' => $image, ':name' => $name, ':body' => $body));
    header("location:index.php?controller=pages&action=showEvent");
  }
}  

}
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
  