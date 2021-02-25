<?php


class Admin
{
	public static function getApplicationList($status){
		$db = Db::getConnection();
		
		$newsList = array();
		
		$result = $db->prepare("SELECT email, autor, id, name, topic, short_content, status FROM application WHERE status=:status ORDER BY id DESC");
		$result->execute(['status' => $status]);
			
		$i = 0;
		while($row = $result->fetch()){
			$newsList[$i]['name'] = $row['name'];
			$newsList[$i]['topic'] = $row['topic'];;
			$newsList[$i]['short_content'] = $row['short_content'];
			$newsList[$i]['status'] = $row['status'];
			$newsList[$i]['email'] = $row['email'];
			$newsList[$i]['autor'] = $row['autor'];
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
	
	public static function getApplication($id){
		$id = intval($id);
		
		if($id){
			$db = Db::getConnection();
			
			$result = $db->prepare("SELECT * FROM application WHERE id=:id");
			$result->execute(['id' => $id]);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$applicationItem = $result->fetch();
			
			if(!$applicationItem){
				header("Location: ../admin");
			}
			
			return $applicationItem;
		}
	}
	
	public static function good($id){
		$id = intval($id);
		
		if($id){
			$db = Db::getConnection();
			
			$result = $db->prepare("UPDATE application SET status='Одобрено' WHERE id=:id");
			$result->execute(['id' => $id]);
			
			header("Location: ../admin");
		}
	}
	
	public static function bad($id){
		$id = intval($id);
		
		if($id){
			$db = Db::getConnection();
			
			$result = $db->prepare("UPDATE application SET status='Отклонено' WHERE id=:id");
			$result->execute(['id' => $id]);
			
			header("Location: ../admin");
		}
	}
	
	public static function logOut(){
		Session::destroy();
		header("Location: ../login");
	}
	
	public static function autor(){
		$db = Db::getConnection();
		
		$email = Session::get('admin');
		
		$result = $db->query("SELECT * FROM users WHERE email='$email'");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		
		$autor = $result->fetch();

			
		return $autor;
	}
	
	public static function asave($params){
		$id = $params[0];
		$file = 'file' . $params[1];
		$type = 'type' . $params[1];
		
		$db = Db::getConnection();
		
		$result = $db->prepare("SELECT * FROM application WHERE id=:id");
		$result->execute(['id' => $id]);
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