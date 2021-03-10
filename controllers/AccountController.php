<?php

include_once(ROOT . '/models/Account.php');

class AccountController
{
	
	public function actionLogin(){
		if(Session::get('user')){
			header("Location: user");
		}
		else if(Session::get('admin')){
			header("Location: admin");
		}
		$message = Account::login();
		
		require_once(ROOT . '/views/account/login.php');
		
		return true;
	}
	
	public function actionRegister(){
		if(Session::get('user')){
			header("Location: user");
		}
		else if(Session::get('admin')){
			header("Location: admin");
		}
		$message = Account::register();
		
		require_once(ROOT . '/views/account/register.php');
		
		return true;
	}
}