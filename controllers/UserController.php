<?php

include_once(ROOT . '/models/User.php');

class UserController
{
	
	public function actionIndex(){
		$name = 'Войдите пожалуйста';
		$is_user = false;
		
		if(Session::get('user')){
			$is_user = true;
			$list = [];
			$autor = [];
			
			$list = User::getApplicationList();
			$autor = User::autor();
			$name = $autor['name'];
			
			
			require_once(ROOT . '/views/user/user.php');
		}
		else{
			require_once(ROOT . '/views/user/user.php');
		}
		
		return true;
	}
	
	public function actionCreate(){
		if(Session::get('user')){
			$autor = [];
			
			$message = User::createApplication();
			
			$autor = User::autor();
			$name = $autor['name'];
			
			
			require_once(ROOT . '/views/user/createApplication.php');
		}
		else{
			header("Location: user");
		}
		
		return true;
	}
	
	public function actionApplication($params){
		if(Session::get('user')){
			$autor = [];
			
			$applicationItem = [];
			
			$applicationItem = User::getApplication($params[0]);
			
			$autor = User::autor();
			$name = $autor['name'];
			
			
			require_once(ROOT . '/views/user/application.php');
		}
		else{
			header("Location: ../user");
		}
		
		return true;
	}
	
	public function actionLogout(){
		if(Session::get('user')){
			User::logOut();
		}
		else{
			header("Location: ../user");
		}
		
		return true;
	}
	
	public function actionSave($params){
		if(Session::get('user')){
			User::save($params);
		}
		else{
			header("Location: ../user");
		}
		
		return true;
	}
}