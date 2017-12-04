<!DOCTYPE html>
<?php 
session_start();
require 'method/connect.php';
ini_set("display_errors", "Off");
?>
<html>
<head>
	<title>Message Board - Course 5</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<header>
		<ul>
			<li><a href="admin/adminlog.php">Admin</a></li>
			<li><a href="log.php">我要留言</a></li>
			<?php 
			if ($_SESSION["theguest"]["guestname"]!=Null) { ?>
				<?php echo "Hi!!".$_SESSION["theguest"]["guestname"]; ?>
				<button><a href="method/logout.php">Log Out</a></button>
			<?php }
			?>
		</ul>
	</header>
	<section id="result">
		
		<?php 
      $select = $connect -> prepare("SELECT * FROM posts");
      $select -> execute();
      foreach (($select -> fetchall(PDO::FETCH_ASSOC)) as $result) { ?>

       <div class="item" style="padding: 5px"> 
                	<?php
					if ($_SESSION["theguest"]["guestname"] == $result["who_say"]){
						echo $result["who_say"]." "."說:";
					} elseif ($_SESSION["thehost"]["name"] == $result["who_say"]) {
						echo $result["who_say"]." "."say:";
					}  else{
						echo $result["who_say"]." "."說";
					}
                	?>
    				<p class="time"> <?php echo $result["post_time"]; ?> </p>
    				<p class="message_show"> <?php echo $result["body"]; ?> </p>
    			</div>
		<?php	}
		?>	
	</section>

</body>
</html>
