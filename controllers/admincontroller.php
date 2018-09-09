<?php

class admin{

	public function event(){

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

	public function deleteEvent(){

		if(isset($_POST['id_p']))
		{

			$db = DB::getInstance();
			$result_delete=$db->prepare('DELETE FROM event WHERE id_e =:id_e');
			$result_delete->bindParam(':id_e', $_POST['id_e']);
			if($result_delete->execute()){
				header("location:index.php?controller=users&action=profile");
			}
		}
	}

	public function editEvent(){


		if(isset($_POST["id"]))
		{

			$id=$_POST["id"];

		}
		$db = DB::getInstance();
		$result=$db->prepare('UPDATE event SET edit = 1 WHERE id_e = ?');
		$result->execute([$id]);

		$result=$db->prepare('SELECT * FROM event WHERE id_e=?');
		$result->execute([$id]);
		$edit = $result->fetch();

		require_once('views/users/editForm.php');


	}
	public function update(){


		$db = DB::getInstance();

		if(isset($_POST['name'])){
			$postname=$_POST['name'];
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

		$result=$db->prepare('UPDATE event SET edit = 0 WHERE id_e = ?');
		$result->execute([$id]);

		$result=$db->prepare('UPDATE event SET name = :name WHERE id_e = :id');
		$result->execute(array(':name'=>$name, ':id'=>$id));

		$result=$db->prepare('UPDATE event SET body = :body WHERE id_e = :id');
		$result->execute(array(':body'=>$body, ':id'=>$id));

		$result=$db->prepare('UPDATE event SET image = :image WHERE id_e = :id');
		$result->execute(array(':image'=>$image, ':id'=>$id));


		header("Location: index.php?controller=admin&action=showEvent");

	}

	public function editForm(){

		require_once('views/users/editForm.php');
	}

	public function showEvent(){
      require_once('views/posts/showEvent.php');
    }
}

?>