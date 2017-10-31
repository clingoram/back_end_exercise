<!DOCTYPE html>
<?php
session_start();
require_once '../method/connect.php';
ini_set("display_errors", "Off");
?>
<html>
<head>
	<title>Board -course4</title>
	<link rel="stylesheet" type="text/css" href="../../style/style.css">
</head>
<body>
	<main>
		<header>
			<?php echo "Hi!!"." ".$_SESSION["thehost"]["name"]; ?>
			<button class="log"><a href="../method/logout.php">LogOut</a></button>
		</header>
		<form id="postit" action="../method/action.php" method="post">
			<input id="type_area" type="text" name="message" placeholder="Type in Here">
			<input type="submit" name="save">
		</form>
		<section id="result">
			<?php 

			    $select = $connect -> prepare("SELECT * FROM posts");
          $select -> execute();
          foreach (($select -> fetchall(PDO::FETCH_ASSOC)) as $result) { ?>

                <div class="item" style="padding: 5px"> 
                	<?php 
					
					if($_SESSION["thehost"]["name"] == $result["who_say"]){
						echo $result["who_say"]." "."say:";
					} else{
						echo "訪客".$result["who_say"]." "."說";
					}
                	?>
    				<p class="time"> <?php echo $result["post_time"]; ?> </p>
    				<p class="message_show"> <?php echo $result["body"]; ?> </p>
    			</div>
		<?php	}
		?>	
		</section>
	</main>
	
</body>
</html>
