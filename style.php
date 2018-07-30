<?php header("Content-type: text/css"); 
$num = rand(1,6);
$img_url = "img/lounge{$num}.jpg"
?>
body {
	font: 12px arial;
	color: #222;
	text-align: center;
	padding: 35px;
	background-image: url(<?=$img_url?>);
	background-color: rgb(134, 21, 21);
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
}

.enter{
	font-weight: bold;
	color: #fff;
	padding: 3px;
	background-color: rgba(0, 0, 0, 0.35);
	border-radius: 4px;
}

#welcome1{
	color: #fff;
	padding: 3px;
	background-color: rgba(0, 0, 0, 0.35);
	border-radius: 4px;
}

form,p,span {
	margin: 0;
	padding: 0;
}

input {
	font: 12px arial;
}

a {
	color: #FFF;
	font-size: 1em;
	font-weight: bold;
	padding: 3px 6px 3px 3px;
	text-decoration: none;
	transition: .05s ease-out;
}

a:hover {
	font-size: 1.1em;
	transition: .05s ease-out;
}

#wrapper,#loginform {
	margin: 0 auto;
	padding-bottom: 25px;
}

#loginform {
	padding-top: 18px;
}

#loginform p {
	margin: 5px;
}

#chatbox {
	text-align: left;
	margin: 0 auto;
	margin-bottom: 25px;
	padding: 10px;
	background: rgba(255, 255, 255, 0.95);
	border: 1px solid rgb(209, 172, 240);
	overflow: auto;
}

#usermsg {
	border: 1px solid #ACD8F0;
}

#submit {
	width: 60px;
}

.error {
	color: #ff0000;
}

#menu {
	padding: 12.5px 25px 0px 25px;
	height: 40px;
}

.welcome {
	float: left;
	color: #fff;
	font-size: 2em;
	padding: 3px 6px 3px 3px;
	background-color: rgba(0, 0, 0, 0.35);
	border-radius: 5px;
}

.logout {
	float: right;
	line-height: 40px;
}

.msgln {
	margin: 0 0 2px 0;
}

@media screen and (min-width: 601px){
	#chatbox {
		height: 270px;
		width: 430px;
	}
	#wrapper,#loginform {
		width: 504px;
	}
	#usermsg {
		width: 395px;
	}
}

@media screen and (max-width: 600px){
	#usermsg {
		width: 100%;
	}
	#wrapper,#loginform {
		width: 100%;
	}
	#chatbox {
		height: 50vh;
		width: 90%;
	}
	body{
		padding: 5px;
	}
}