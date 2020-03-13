<?
	 $mysqli = new mysqli("localhost", "root", "", "test1");
  
 	 
	$mysqli->query("SET NAMES 'utf-8'");
	session_start();
	if(isset($_POST["submit"])){ //проверка на нажатие кнопки сабмит

		
		$login = htmlspecialchars($_POST["login"]);
		$password = htmlspecialchars($_POST["password"]);
		$_SESSION["login"]=$login;
		$_SESSION["password"]=$password;
		$error_name = "";
		$error=false;

		if(strlen($login)!=0 && strlen($password)!=0){			
			
				if($res = $mysqli->query("SELECT * FROM `gigi` WHERE `name`='$login' AND `text`='$password'")){
	  				if (mysqli_num_rows($res) > 0) {
	     				echo "OK!2";
	     				
	   				}
				
			}
			
			$error_name="type login";
			$error=true;			
		}		
		
		if($error==false){ // '".md5("пароль")."'
			$mysqli->query("insert into `gigi` (`name`,`text`) values ('$login','$password')");
		}
		else{
			$error_name="уже есть такой юзверь";
		}

	}	
	$mysqli->close();
	session_destroy();
?>