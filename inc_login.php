<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['success'])){
	if($_SESSION['success'] == true){
	}else{
		echo '<script type="text/javascript">
				alert("Login invalido verifique os dados introduzidos!");
			  </script>';
	}
}
?>

 
<form action="login.php" method="post">
<table width="80%" border="0" style="margin-top:100px; margin-left:8%;">
  <tbody>
  <?php 
  	if(isset($_SESSION['success']) && $_SESSION['success'] != true){	
		echo '<tr>
			<th colspan="2">  
				<label style="color:#CC0003;">Nome de utilizador ou password incorretos!</label>
			</th>
		</tr>';
	}
  ?>
    <tr>
      <th scope="col">Email</th>
      <td scope="col"><input name="mail" type="text" class="form-control-index" required="required" placeholder="username" style="" /></td>
    </tr>
    <tr>
      <th>Password</th>
      <td><input name="pass" type="password" class="form-control-index" required="required" placeholder="password" /></td>
    </tr>
    <tr>
      <th colspan="2"><input name="login" type="submit" value="Login" /></th>
    </tr>
  </tbody>
</table>
</form> 
