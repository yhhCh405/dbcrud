<?php
class stringWatcher{
	public function formValidate($text,$mode)
	{
		$this->text = $text;
		$this->mode = $mode;

		$text = trim($text);
		$text = stripslashes($text);
		$text = htmlspecialchars($text);

		if ($mode == 'fullname') {
			if (preg_match('/^[a-zA-Z]+\\s*[a-zA-Z]*\\s*[a-zA-Z]*\\s*[a-zA-Z]*\\s*[a-zA-Z]*\\s*[a-zA-Z]*\\s*[a-zA-Z]*\\s*$/', $text)) {
			}
			else{
				return false;
			}
		}

		if ($mode == 'username') {
			if (preg_match('/^[a-zA-Z0-9]+[a-zA-Z0-9_]+[a-zA-Z0-9]$/', $text)) {
			}
			else{
				return false;
			}
		}

		if ($mode == 'email') {
			if (preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.-]{2,5}$/', $text)) {
			}
			else{
				return false;
			}
		}

		if ($mode == 'password') {

		}

		if ($mode == 'paragraph') {

		}
		return $text;

	}
}

class DatabaseOperation{
	public $db_server 	= "127.0.0.1";
	public $db_username = "root";
	public $db_password = "";
	public $db_name 	= "final_project";

	public function __construct(){
		$this->dbConnect();
	}

	public function dbConnect(){
		$conn = mysqli_connect($this->db_server,$this->db_username,$this->db_password,$this->db_name);
		if ($conn) {
			return $conn;
		}else{
			echo "Failed to connect to the Mysql database!";
		}
	}

	public function insertData($table,$names,$values,$count){
		$query = "INSERT INTO `".$table."`".$this->stringBuilder($names,'',$count,'insert-name')." VALUES ".$this->stringBuilder('',$values,$count,'insert-val');
		$q = mysqli_query($this->dbConnect(),$query);
		if ($q) {
			return true;
		}
	}

	// public function validateData($table,$names,$values,$count){
	// 	$query = "SELECT * FROM ".$table." WHERE ".$this->stringBuilder($names,$values,$count,'update');
	// 	$q = mysqli_query($this->dbConnect(),$query);
	// 	if ($q) {
	// 		return true;
	// 	}
	// }

	public function selectId($table,$names,$values,$count){
		$query = "SELECT id FROM ".$table." WHERE ".$this->stringBuilder($names,$values,$count,'is-exist');
		$q = mysqli_query($this->dbConnect(),$query);
		if ($q) {
			$row = mysqli_fetch_assoc($q);
			if ($row) {
				return $row['id'];
			}else{
				return false;
			}
		}
	}

	public function select($table,$names,$values,$count,$target){
		$query = "SELECT ".$target." FROM ".$table." WHERE ".$this->stringBuilder($names,$values,$count,'is-exist');
		$q = mysqli_query($this->dbConnect(),$query);
		if ($q) {
			$row = mysqli_fetch_assoc($q);
			if ($row) {
				return $row[$target];
			}else{
				return false;
			}
		}
	}

	public function isDataExist($table,$colName,$value,$count){
		$query = "SELECT * FROM ".$table." WHERE ".$this->stringBuilder($colName,$value,$count,'is-exist');
		$q = mysqli_query($this->dbConnect(),$query);
		if ($q) {
			$row = mysqli_fetch_assoc($q);
			if ($row) {
				return true;
			}else{
				return false;
			}
		}
	}

	public function stringBuilder($colName,$colVal,$colCount,$operation){
		//nested oop style
		//instruction: use |(pipe) as splitter point
		switch ($operation) {
			case 'update': //same with 'select'
				//instruction: 1.use |(pipe) as splitter point. 2.sort correctly. 3.modify $arrayName
				$colnamearray = explode("|", $colName);
				$colvalarray = explode("|", $colVal);
				$result = "";

				for ($i=0; $i < $colCount; $i++) { 
					$result .= $colnamearray[$i]."='".$colvalarray[$i]."',";
				}

				$result = substr($result, 0,-1);
				return $result;
				break;

			case 'is-exist':
				$colnamearray = explode("|", $colName);
				$colvalarray = explode("|", $colVal);
				$result = "";

				for ($i=0; $i < $colCount; $i++) { 
					$result .= $colnamearray[$i]."='".$colvalarray[$i]."' AND ";
				}

				$result = substr($result, 0,-5);
				return $result;
				break;

			case 'insert-name':
				$colnamearray = explode("|", $colName);
				$result = "(";

				for ($i=0; $i < $colCount; $i++) { 
					$result .= "`".$colnamearray[$i]."`,";
				}

				$result = substr($result, 0,-1);
				$result .= ")";

				return $result;
				break;

			case 'insert-val':
				$colvalarray = explode("|", $colVal);
				$result = "(";

				for ($i=0; $i < $colCount; $i++) {
					if ($colvalarray[$i] == 'now()') {
						$result .= $colvalarray[$i].",";
					}
					elseif (preg_match("/^[A-Za-z_]+\((.*)\)$/", $colvalarray[$i])) {
						$result .= $colvalarray[$i].",";
					}
					else{
						$result .= "'".$colvalarray[$i]."',";
					}
				}

				$result = substr($result, 0,-1);
				$result .= ")";

				return $result;
				break;
			
			default:
				# code...
				break;
		}
	}

	public function dateNow(){
		$date = new DateTime();
		//$date = DateTime::createFromFormat("d/m/Y H:i:s","11/11/2019 11:25:59");
		$date = $date->format("d/m/Y H:i:s");
		return $date;
	}
}
?>