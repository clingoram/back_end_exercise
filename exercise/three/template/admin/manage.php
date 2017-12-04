<!DOCTYPE html>
<!-- admin管理頁面，可刪除留言 -->
<?php
session_start();
require_once '../method/connect.php';
ini_set("display_errors", "Off");
?>
<html>
<head>
	<title>Manage Board - Course 5</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
	<main>
		<header>
			<?php echo "Hi!!"." ".$_SESSION["thehost"]["name"]; ?>
			<button class="log"><a href="../method/logout.php">LogOut</a></button>
		</header>

		<form id="post_it" action="adminaction.php" method="post">
			<input id="type_area" type="text" name="message" placeholder="Type in Here">
			<input type="submit" name="save">
		</form>
			
		<section id="result">
			<?php 

			$sql = "SELECT * FROM posts";
			$select = $connect -> prepare($sql);
            $select -> execute();
            foreach (($select -> fetchall(PDO::FETCH_ASSOC)) as $result) { ?>

                <div class="item" style="padding: 5px"> 
                	<?php 
					
					if($_SESSION["thehost"]["name"] == $result["who_say"]){
						//$sql= "SELECT * FROM posts WHERE who_say='Wilboar'";
						echo $result["who_say"]." "."say:";
					} else{
						echo "訪客".$result["who_say"]." "."說";
					}
                	?>
    				<p class="time"> <?php echo $result["post_time"]; ?> </p>
    				<p class="message_show"> <?php echo $result["body"]; ?> </p>
    				<button><a href="admindelete.php?id=<?php echo $result['idposts']; ?>">刪除</a></button>
    			</div>
				
		<?php	}

		?>	
			
		</section>
	</main>
	
</body>
</html>
