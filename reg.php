<?php
header('Access-Control-Allow-Origin: *');

$mysql_host = "217.182.197.235";
$mysql_database = "new_eden";
$mysql_user = "yukizava";
$mysql_password = "XjrXiyxZZ2e2ZjCj";

$link = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("Error connecting MySQL" );
mysql_select_db($mysql_database, $link) or die ('Ошибка при подключении к БД');

    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
	if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
 if (empty($login) or empty($password) or empty($email))
    {
    echo ("You did not enter all the information, fill in all the fields!");
	exit();
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);


 $password = stripslashes($password);
    $password = htmlspecialchars($password);
	$email = stripslashes($email);
    $email = htmlspecialchars($email);
    $login = trim($login);
    $password = trim($password);
	$email = trim($email);
    $q1 = mysql_query("SELECT login FROM `accounts` WHERE `login`='".$login."'");
	$loginb = mysql_fetch_array($q1);
	$loginbd=$loginb['login'];
    if($loginbd == $login){
    echo("Username entered already in use. Please choose a different name.");
	exit();
    }
 	else
    $result2 = mysql_query ("INSERT INTO accounts (login,password,email) VALUES('$login','$password','$email')");
    if ($result2=='TRUE')
    {
    echo "You have successfully registered!";
    }
 else {
    echo "Error! You are not registred.";
    }
    ?>
