<!DOCTYPE html>
<!-- user登入後，在user/index.php寫下對admin的留言和回覆admin留言，並於layout.php、admin/manage.php顯示出 -->
<?php
session_start();
require_once '../method/connect.php';
ini_set("display_errors", "Off");
?>
<html>
<head>
	<title>想說什麼 - Course 5</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
	<main>
		<header>
			<!-- 假如使用者有加入會員的話，在log.php重新登入後，會在這顯示所登入的名稱 -->
			<?php 
				if($_SESSION["theguest"]["guestname"] != Null) {
					echo "Hi!!"." ".$_SESSION["theguest"]["guestname"];
				}
			?>
			<button class="log"><a href="../method/logout.php">LogOut</a></button>
		</header>
		<!-- user留言 -->
		<form id="post_it" action="useraction.php" method="post">
            <input type="hidden" name="csrftoken">
			<input id="type_area" type="text" name="guestmessage" placeholder="Type in Here">
			<input type="submit" name="guestsave">
		</form>
       
		<section id="result">
			<?php 

			$select = $connect -> prepare("SELECT * FROM posts");
            $select -> execute();
            foreach (($select -> fetchall(PDO::FETCH_ASSOC)) as $result) { ?>

                <div class="item" style="padding: 5px"> 
                	<?php 

					if($_SESSION["theguest"]["guestname"] == $result["who_say"]){
						echo $_SESSION["theguest"]["guestname"]." "."說:"; // 已登入的帳號
					} elseif ($_SESSION["thehost"]["name"] != $result["who_say"]) {
						echo "訪客".$result["who_say"]." "."說"; // 未登入的帳號
					} else{
             echo $_SESSION["theguest"]["guestname"]." "."說:";
          }
                	?>
    				<p class="time"> <?php echo $result["post_time"]; ?> </p>
    				<p class="message_show"> <?php echo $result["body"]; ?> </p>

    				<?php 
    				// 只可以刪除自己的留言
    				if($result["who_say"] === $_SESSION["theguest"]["guestname"]){ ?>
                        <br><a href="userdelete.php?id=<?php echo $result['idposts']; ?>">刪除</a>
                   <?php } 

                   ?>
    				
    			</div>
		<?php	}
		?>	
		</section>
	</main>
</body>
</html>
