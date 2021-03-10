<?php


class User
{
	public static function getApplication($id){
		$id = intval($id);
		
		if($id){
			$email = Session::get('user');
			
			$db = Db::getConnection();
			
			$result = $db->prepare("SELECT * FROM application WHERE id=:id AND email=:email");
			$result->execute(['email' => $email, 'id' => $id]);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$applicationItem = $result->fetch();
			
			if(!$applicationItem){
				header("Location: ../user");
			}
			
			return $applicationItem;
		}
	}
	
	public static function getApplicationList(){
		$db = Db::getConnection();
		
		$newsList = array();
		$email = Session::get('user');
		
		$result = $db->query("SELECT id, name, topic, short_content, status "
			. "FROM application "
			. "WHERE email='$email'"
			. "ORDER BY id DESC");
			
		$i = 0;
		while($row = $result->fetch()){
			$newsList[$i]['name'] = $row['name'];
			$newsList[$i]['topic'] = $row['topic'];;
			$newsList[$i]['short_content'] = $row['short_content'];
			$newsList[$i]['status'] = $row['status'];
			$newsList[$i]['id'] = $row['id'];
			if($newsList[$i]['status'] == 'Проверяется'){
				$newsList[$i]['background'] = "blue";
			}
			else if($newsList[$i]['status'] == 'Одобрено'){
				$newsList[$i]['background'] = "green";
			}
			else{
				$newsList[$i]['background'] = "red";
			}
			$i++;
		}
		
		return $newsList;
	}
	
	public static function createApplication()
	{
		$arr1 = array('doc', 'docx', 'pdf');
		$arr2 = array('ppt', 'pptx', 'pdf');
		
		$message = "";
		
		if(isset($_POST['name'])){
			$topic = $_POST['topic'];
			$name = $_POST['name'];
			$short_content = $_POST['short_content'];
			$info_autor = $_POST['info_autor'];
			
			if(mb_strlen($name) < 4){
				$message = "Название доклада слишком короткое";
				return $message;
			}
			
			if(mb_strlen($short_content) < 5){
				$message = "Краткое описание доклада слишком короткое";
				return $message;
			}
			
			if(mb_strlen($info_autor) < 4){
				$message = "Расскажите о себе чуть побольше";
				return $message;
			}
			
			$extension1 = pathinfo($_FILES["file1"]["name"], PATHINFO_EXTENSION);
			$extension2 = pathinfo($_FILES["file2"]["name"], PATHINFO_EXTENSION);
			
			if((in_array($extension1, $arr1) && in_array($extension2, $arr2)) == false){
				$message = "Не верное расширение файлов";
				return $message;
			}
						
			if($_FILES["file1"]["size"] > 10000000 && $_FILES["file2"]["size"] > 30000000){
				$message = "Превышен размер файлов";
				return $message;
			}
			$db = Db::getConnection();
								
			$email = Session::get('user');
								
			$result = $db->query("SELECT name FROM users WHERE email='$email'");
			$name_autor = $result->fetch()['name'];
								
			$tmp_name1 = $_FILES["file1"]["tmp_name"];
			$name1 = 'uploads/1' . time() . '.' . $extension1;
			$tmp_name2 = $_FILES["file2"]["tmp_name"];
			$name2 = 'uploads/2' . time() . '.' . $extension2;
			$type1 = $_FILES["file1"]["type"];
			$type2 = $_FILES["file2"]["type"];
								
			move_uploaded_file($tmp_name1, $name1);
			move_uploaded_file($tmp_name2, $name2);
								
			$arr = [
				'name'			=>	$name,
				'info_autor'	=>	$info_autor,
				'topic'			=>	$topic,
				'short_content'	=>	$short_content,
				'autor'			=>	$name_autor,
				'email'			=>	$email,
				'file1'			=>	$name1,
				'file2'			=>	$name2,
				'type1'			=>	$type1,
				'type2'			=>	$type2
			];
								
								
			$result = $db->prepare("INSERT INTO application (name, info_autor, topic, short_content, autor, email, status, file1, file2, type1, type2) VALUES (:name, :info_autor, :topic, :short_content, :autor, :email, 'Проверяется', :file1, :file2, :type1, :type2)");
			$result->execute($arr);
			$resultId = $db->query("SELECT LAST_INSERT_ID();");
			$rowId = $resultId->fetch();
			$lastId = $rowId[0];
			if($result){
				header("Location: application/$lastId");
			}
			else{
				$message = "Неизвестная ошибка";
			}
		}
		
		return $message;
	}
	
	public static function logOut(){
		Session::destroy();
		header("Location: ../login");
	}
	
	public static function autor(){
		$db = Db::getConnection();
		
		$email = Session::get('user');
		
		$result = $db->prepare("SELECT * FROM users WHERE email=:email");
		$result->execute(['email' => $email]);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		
		$autor = $result->fetch();

			
		return $autor;
	}
	
	public static function save($params){
		$email = Session::get('user');
		$id = $params[0];
		$file = 'file' . $params[1];
		$type = 'type' . $params[1];
		
		$db = Db::getConnection();
		
		$result = $db->prepare("SELECT * FROM application WHERE email=:email AND id=:id");
		$result->execute(['email' => $email, 'id' => $id]);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		
		$row = $result->fetch();
		$path = $row[$file];
		$fileType = $row[$type];
		$fileName = explode('/', $path);
		$fileName = $fileName[1];
		
		if(file_exists($path)){
			header("Content-Type: $fileType");
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=" . basename($fileName));
			header("Expires: 0");
			header("Cache-Control: must-revalidate");
			header("Pragma: public");
			header("Content-Length: " . filesize($path));
			readfile($path);
		}
	}
}