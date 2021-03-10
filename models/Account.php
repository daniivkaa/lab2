<?php


class Account
{
	public static function register()
	{
		$message = "";
		
		if(isset($_POST['email'])){
			
			$email = $_POST['email'];
			$name = $_POST['name'];
			$password = $_POST['password'];
			$r_password =$_POST['r_password'];
			$check = $_POST['check'];
				
			$arr = [
				'email'		=>	$email,
				'password'	=>	md5($password),
				'name'		=>	$name
			];
				
			if(!isset($_POST['check'])){
				$message = "Примите согласие на обработку персональных данных";
				return $message;
			}
			
			if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
				$message = "Email введен не правильно";
				return $message;
			}
			
			if(mb_strlen($name) < 3){
				$message = "Слишком короткое имя";
				return $message;
			}
			
			if(iconv_strlen($password) < 5){
				$message = "Слишком короткий пароль";
				return $message;
			}
			
			if($password != $r_password){
				$message = "Пароли не совпадают";
				return $message;
			}
			
			$db = Db::getConnection();
								
			$result = $db->prepare("SELECT id FROM users WHERE email=:email");
			$result->execute(['email' => $email]);
			$row = $result->fetch();
								
			if($row){
				$message = "Такой Email уже есть";
				return $message;
			}
			
			$result = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
			$result->execute($arr);
			
			if($result){
				Session::set('user', $email);
				header("Location: user");
			}
			else{
				$message = "Неизвестная ошибка";
			}
		}
		
		return $message;
	}
	
	public static function login()
	{
		$message = "";
		if(isset($_POST['email'])){
			$db = Db::getConnection();
			
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			
			$arr = [
				'email'		=>	$email,
				'password'	=>	$password
			];
			
			$result = $db->prepare('SELECT is_admin FROM users WHERE email=:email AND password=:password');
			$result->execute($arr);
			
			//$result = $db->query("SELECT is_admin FROM users WHERE email='$email' AND password='$password'");
			$row = $result->fetch();
			
			if(!$row) {
				$message = "Не правильный логин или пароль";
				return $message;
			}
			
			if($row['is_admin']){
				Session::set('admin', $email);
				header("Location: admin");
			}
			else{
				Session::set('user', $email);
				header("Location: user");
			}
		}
		return $message;
	}
}