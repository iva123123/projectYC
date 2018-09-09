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

}
