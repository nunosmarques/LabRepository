<?php session_start();

if(isset($_SESSION['check'])){
	if($_SESSION['check'] == true){
		header('location:main.php');
	}else{
		echo '<script type="text/javascript">
				alert("Login invalido verifique os dados introduzidos!");
			  </script>';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LabApp - Backoffice</title>
<style>
@import url(https://fonts.googleapis.com/css?family=Indie+Flower);

html, body {
  height: 98%;
  min-height: 98%;
}

body {
  background:#1E1E1E;
  
    /* habilita o flex nos filhos diretos */
  display: -ms-flex;
  display: -webkit-flex;
  display: flex;

  /* centraliza na vertical */
  -ms-align-items: center;
  -webkit-align-items: center;
  align-items: center;

  /* centraliza na horizontal */
  -ms-justify-content: center;
  -webkit-justify-content: center;
  justify-content: center;
}

.wrapper {
  width:45%;
  height:auto;
  padding-right:20px !important;
}

.wrapper div {
	width:94%;
	height:auto;
  	background:#333;
	margin-left:15px;
 	padding: 25px 0px 10px 0px !important;	
	border-radius: 20px;
  	border: 1px solid rgba(0, 0, 0, .3);
}

div.input-container{
	width:100%;
	background:none;
	margin:0 !important;
	padding:0 !important;
	border:none;
}

.btLogin{
	width:80px;
	height:35px;
	margin-left:42%;
	
	border-radius:8px;
	padding: 0 6px 2px 6px;
	
	border-color:#CE0039;
	background-color:#FF0057;
	
	color:#FFFFFF;
	font-family: 'Indie Flower', cursive;
	font-size:18px;
	font-weight:bold;
}

.btLogin:hover{
	border-color:#FF0057;
	background-color:#CE0039;
}

.btLogin:active{
	border-color:#CE0039;
	background-color:#FF0057;
}

.label_login{
  	color:#FFFFFF;
 	font-weight:bold;
	padding-left: 14%;
}

.label_wrong{
	height:21px;
	color:#CE0000;
	padding-left:22%;
}

.form-control-index{
  width: 55%;
  margin: 10px 1% !important;
  padding: 6px 0px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
       -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
          transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.form-control-index:focus{
  border-color:#ee2c74;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
}

.form-group {
  margin-bottom: 15px;
  text-align:start;
}

.form-group label{
	margin-left:20px !important;
}
</style>
</head>
<body>

<div class="wrapper">
    
    <div>       
    <form action="login.php" method="post">
        <div class="form-group">
        	<div class="input-container" style="padding-bottom:15px !important;"> 
				<?php 
                if(isset($_SESSION['check']) && $_SESSION['check'] != true){	
                    echo '<label style="color:white;">Nome de utilizador ou password incorretos!</label>';
                }
                ?>
            </div>
            <div class="input-container"> 
                <label class="label_login" style="padding-left:13.5% !important;">Email:</label>
                <input name="mail" type="text" class="form-control-index" required="required" placeholder="username" style="" />
            </div>
            <div class="input-container">
                <label class="label_login">Password:</label>
                <input name="pass" type="password" class="form-control-index" required="required" placeholder="password" />
        	</div>
            <br />
            <input class="btLogin" name="login" type="submit" value="Login" />
        </div>    
    </form>  
    </div>
    
 </div>

</body>
</html>
