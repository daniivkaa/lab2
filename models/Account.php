<?php


class Account
{
	public static function register()
	{
		$message = "";
		
		if(isset($_POST['email'])){
			if(isset($_POST['check'])){
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
				
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					if(mb_strlen($name) > 2){
						if(iconv_strlen($password) > 5){
							if($password == $r_password){
								$db = Db::getConnection();
								
								$result = $db->prepare("SELECT id FROM users WHERE email=:email");
								$result->execute(['email' => $email]);
								$row = $result->fetch();
								
								if(!$row){
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
								else{
									$message = "Такой Email уже есть";
								}
							}
							else{
								$message = "Пароли не совпадают";
							}
						}
						else{
							$message = "Слишком короткий пароль";
						}
					}
					else{
						$message = "Слишком короткое имя";
					}
				}
				else{
					$message = "Email введен не правильно";
				}
				
			}
			else{
				$message = "Примите согласие на обработку персональных данных";
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
			
			if($row) {
				   if($row['is_admin']){
					   Session::set('admin', $email);
					   header("Location: admin");
				   }
				   else{
					   Session::set('user', $email);
					   header("Location: user");
				   }
				} else {
				   $massage = "Не правильный логин или пароль";
				}
		}
		
		return $message;
	}
}