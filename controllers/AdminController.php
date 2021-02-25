<?php

include_once(ROOT . '/models/Admin.php');

class AdminController
{
	
	public function actionIndex(){
		if(Session::get('admin')){
			$autor = [];
			
			$listCheck = [];
			$listGood = [];
			$listBad = [];
			
			$listCheck = Admin::getApplicationList('Проверяется');
			$listGood = Admin::getApplicationList('Одобрено');
			$listBad = Admin::getApplicationList('Отклонено');
			
			$autor = Admin::autor();
			$name = $autor['name'];
			
			require_once(ROOT . '/views/admin/admin.php');
		}
		else{
			header("Location: user");
		}
		
		return true;
	}
	
	public function actionApplication($params){
		if(Session::get('admin')){
			$autor = [];
			
			$applicationItem = [];
			
			$applicationItem = Admin::getApplication($params[0]);
			
			$autor = Admin::autor();
			$name = $autor['name'];
			
			
			require_once(ROOT . '/views/admin/application.php');
		}
		else{
			header("Location: ../user");
		}
		
		return true;
	}
	
	public function actionGood($params){
		if(Session::get('admin')){
			Admin::good($params[0]);
		}
		else{
			header("Location: ../admin");
		}
		
		return true;
	}
	
	public function actionBad($params){
		if(Session::get('admin')){
			Admin::bad($params[0]);
		}
		else{
			header("Location: ../admin");
		}
		
		return true;
	}
	
	public function actionLogout(){
		if(Session::get('admin')){
			Admin::logOut();
		}
		else{
			header("Location: ../admin");
		}
		
		return true;
	}
	
	public function actionAsave($params){
		if(Session::get('admin')){
			Admin::asave($params);
		}
		else{
			header("Location: ../admin");
		}
		
		return true;
	}
}