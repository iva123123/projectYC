<!-- <br><br>

<div class="container">
		<div class="view-form">
			<div class="row">
				<div class="col-sm-3">
					<p> <?php //echo $postname ?></p>
					<img src="uploads/<?php //echo $row['image']?>"><br><br>
				</div>
			</div>
       </div>
</div> -->

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
			<p><?php echo $postname ?></p>
			<p><?php echo $body ?></p>
			<img src="uploads/<?php echo $row['image']?>"><br><br>

			<a class="btn btn-info" href="edit_form.php?edit_id_u=<?php echo $row['id_u']?>" title="click for edit" onlick="return confirm('Sure to edit this record')"><span class="glyphicon glyphicone-edit"></span>Edit</a>
			<a class="btn btn-danger" href="?id_u=<?php echo $row['id_u']?>" title="click for delete" onclick="return confirm('Sure to delete this record?')">Delete</a>
			
			</div>

			<?php 

				}
			}
			?>
		</div>
	</div>
</div>