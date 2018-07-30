<?php
session_start ();
function loginForm() {
	echo '
    <div id="loginform">
	<form action="index.php" method="post">
		<h1 id="welcome1">WELCOME TO UNCs EVENING LOUNGE</h1>
		<br></br>
        <p class="enter">Enter your "screename"</p>
        <label class="enter" for="name">Name:</label>
        <input type="text" name="name" id="name" />
        <input type="submit" name="enter" id="enter" value="Enter" />
    </form>
    </div>
    ';
}

if (isset ( $_POST ['enter'] )) {
	if ($_POST ['name'] != "") {
		$_SESSION ['name'] = stripslashes ( htmlspecialchars ( $_POST ['name'] ) );
		$fp = fopen ( "log.html", 'a' );
		fwrite ( $fp, "<div class='msgln'><i>Please welcome " . $_SESSION ['name'] . " to the chatroom.</i><br></div>" );
		fclose ( $fp );
	} else {
		echo '<span class="error">Enter your "screename"</span>';
	}
}

if (isset ( $_GET ['logout'] )) {

	// Simple exit message
	$fp = fopen ( "log.html", 'a' );
	fwrite ( $fp, "<div class='msgln'><i>" . $_SESSION ['name'] . " has left the chatroom.</i><br></div>" );
	fclose ( $fp );

	session_destroy ();
	header ( "Location: index.php" ); // Redirect the user
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>UNC's Evening Lounge and Chatroom</title>
<link type="text/css" rel="stylesheet" href="style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php
	if (! isset ( $_SESSION ['name'] )) {
		loginForm ();
	} else {
		?>
<div id="wrapper">
		<div id="menu">
			<p class="welcome">
				Good evening, <b><?php echo $_SESSION['name']; ?></b>
			</p>
			<p class="logout">
				<a id="exit" href="#">Exit Chatroom</a>
			</p>
			<div style="clear: both"></div>
		</div>
		<div id="chatbox"><?php
		if (file_exists ( "log.html" ) && filesize ( "log.html" ) > 0) {
			$handle = fopen ( "log.html", "r" );
			$contents = fread ( $handle, filesize ( "log.html" ) );
			fclose ( $handle );

			echo $contents;
		}
		?></div>

		<form name="message" action="">
			<input name="usermsg" type="text" id="usermsg" size="63" /> <input
				name="submitmsg" type="submit" id="submitmsg" value="Send" />
		</form>
	</div>
	<script type="text/javascript"
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
});

//jQuery Document
$(document).ready(function(){
	//If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Leaving the chatroom is not recommended.");
		if(exit==true){window.location = 'index.php?logout=true';}
	});
});

//If user submits the form
$("#submitmsg").click(function(){
		var clientmsg = $("#usermsg").val();
		$.post("post.php", {text: clientmsg});
		$("#usermsg").attr("value", "");
		loadLog;
	return false;
});

function loadLog(){
	var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
	$.ajax({
		url: "log.html",
		cache: false,
		success: function(html){
			$("#chatbox").html(html); //Insert chat log into the #chatbox div

			//Auto-scroll
			var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
			if(newscrollHeight > oldscrollHeight){
				$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
			}
	  	},
	});
}

setInterval (loadLog, 250);
</script>
<?php
	}
	?>
	<script type="text/javascript"
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	<script type="text/javascript">
</script>
</body>
</html>
