<?php
// PHP Mysql database easy operation library
// Written & copyright by Ch405
// See documentation in -> https://www.github.com/yhhCh405
// If you have any suggesstion with this program, please don't hesitate to contact me on facebook -> https://www.facebook.com/Ch405.yhh 

include('config.php');

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

class DatabaseOperation extends globalVariables{
	public static $table = "";
	public static $colNames = "";
	public static $colValues = "";
	public static $colCount = "";
	public static $whereNames = "";
	public static $whereValues = "";
	public static $whereCount = "";

	use stringBuilder;

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

	public function insert($table,$names,$values,$count){
		$query = "INSERT INTO `".$table."`".$this->stringBuilder($names,'',$count,'insert-name')." VALUES ".$this->stringBuilder('',$values,$count,'insert-val');
		$q = mysqli_query($this->dbConnect(),$query);
		if ($q) {
			return true;
		}else{
			return false;
		}
	}

	public function update($table,$names,$values,$count,$where_name,$where_val,$where_count){
		$query = "UPDATE ".$table." SET ".$this->stringBuilder($names,$values,$count,'update')." WHERE ".$this->stringBuilder($where_name,$where_val,$where_count,'is-exist');
		$q = mysqli_query($this->dbConnect(),$query);
		if ($q) {
			return true;
		}else{
			return false;
		}
	}


	public function selectId($table,$where_names,$where_values,$count){
		$query = "SELECT id FROM ".$table." WHERE ".$this->stringBuilder($where_names,$where_values,$count,'is-exist');
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

	public function select($table,$where_names,$where_values,$count,$target){
		$query = "SELECT ".$target." FROM ".$table." WHERE ".$this->stringBuilder($where_names,$where_values,$count,'is-exist');
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

	public function delete($table,$where_names,$where_values,$count){
		$query = "DELETE FROM ".$table." WHERE ".$this->stringBuilder($where_names,$where_values,$count,'is-exist');
		$q = mysqli_query($this->dbConnect(),$query);
		if ($q) {
			return true;
		}else{
			return false;
		}
	}
	
	public function isDataExist($table,$where_names,$where_values,$count){
		$query = "SELECT * FROM ".$table." WHERE ".$this->stringBuilder($where_names,$where_values,$count,'is-exist');
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


//ready
	public static function insertReady(){
		if (self::isAllSet()) {
			if((new self)->insert(self::getTableName(),self::getColNames(),self::getValues(),self::getCount())){
				return true;
			}else{
				return false;
			}
		}else{
			echo "<p>You have missing some methods to set! Check if you have forgotten one of the following method<br><ul>
			<li><code>setTableName(tableName)</code></li><li><code>setColNames(col_names)</code></li><li><code>setValues(col_values)</code></li><li><code>setCount(count)</code></li>";
		}
	}

	public static function updateReady(){
		if (self::isAllSet()) {
			if((new self)->insert(self::getTableName(),self::getColNames(),self::getValues(),self::getCount(),self::getWhereNames(),self::getWhereValues(),self::getWhereCount())){
				return true;
			}else{
				return false;
			}
		}else{
			echo "<p>You have missing some methods to set! Check if you have forgotten one of the following method<br><ul>
			<li><code>setTableName(tableName)</code></li><li><code>setColNames(col_names)</code></li><li><code>setValues(col_values)</code></li><li><code>setCount(count)</code></li><li><code>setWhereNames(names)</code></li><li><code>setWhereValues(values)</code></li>";
		}
	}

	public static function deleteReady(){
		if (self::isAllSet()) {
			if((new self)->delete(self::getTableName(),self::getWhereNames(),self::getWhereValues(),self::getWhereCount())){
				return true;
			}else{
				return false;
			}
		}else{
			echo "<p>You have missing some methods to set! Check if you have forgotten one of the following method<br><ul>
			<li><code>setTableName(tableName)</code></li><li><code>setWhereNames(col_names)</code></li><li><code>setWhereValues(col_values)</code></li><li><code>setWhereCount(count)</code></li></ul>";
		}
	}


//This
	public static function selectThis($row){
		if (self::isAllSet()) {
			return (new self)->select(self::getTableName(),self::getWhereNames(),self::getWhereValues(),self::getWhereCount(),$row);
		}else{
			echo "<p>You have missing some methods to set! Check if you have forgotten one of the following method<br><ul>
			<li><code>setTableName(tableName)</code></li><li><code>setColNames(col_names)</code></li><li><code>setValues(col_values)</code></li><li><code>setCount(count)</code></li>";
		}
	}

	public static function deleteThis($whereNames,$whereValues,$where_count){
		if(self::getTableName()!=""){
			return (new self)->delete(self::getTableName(),$whereNames,$whereValues,$where_count);
		}else{
			echo "<p>You have missing some methods to set! Check if you have forgotten one of the following method<br><ul>
			<li><code>setTableName(tableName)</code></li><li><code>setWhereNames(col_names)</code></li><li><code>setWhereValues(col_values)</code></li><li><code>setWhereCount(count)</code></li></ul>";
		}	
	}



//setter
	public static function setTableName($tableName){
		self::$table = $tableName;
	}

	public static function setColNames($col_names){
		self::$colNames = $col_names;
	}

	public static function setValues($col_values){
		self::$colValues = $col_values;
	}

	public static function setCount($count){
		(int) self::$colCount = $count;
	}

	public static function setWhereNames($wName){
		self::$whereNames = $wName;
	}

	public static function setWhereValues($wValue){
		self::$whereValues = $wValue;
	}

	public static function setWhereCount($wCount){
		(int) self::$whereCount = $wCount;
	}

//getter
	public static function getTableName(){
		return self::$table;
	}

	public static function getColNames(){
		return self::$colNames;
	}

	public static function getValues(){
		return self::$colValues;
	}

	public static function getCount(){
		return self::$colCount;
	}

	public static function getWhereNames(){
		return self::$whereNames;
	}

	public static function getWhereValues(){
		return self::$whereValues;
	}

	public static function getWhereCount(){
		return self::$whereCount;
	}



//check setters
	public static function isAllSet(){
		if (self::getTableName()!="" && (self::getColNames()!="" || self::getWhereNames()!="") && (self::getValues()!="" || self::getWhereValues()!="") && (self::getCount()!="" || self::getWhereCount()!="")) {
			return true;
		}else{
			return false;
		}
	}

//delete static memory
	public static function forgetAll(){
		self::setTableName("");
		self::setColNames("");
		self::setValues("");
		self::setCount("");
	}
}


	// public function loopAll($table){
	// 	$sql = "SELECT * FROM ".$table;
	// 	$result = mysqli_query($this->dbConnect(),$sql);
	// 	$row = mysqli_fetch_assoc($result);
	// 	return ;
	// }


trait StringBuilder{
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
}
	// public function dateNow(){
	// 	$date = new DateTime();
	// 	//$date = DateTime::createFromFormat("d/m/Y H:i:s","11/11/2019 11:25:59");
	// 	$date = $date->format("d/m/Y H:i:s");
	// 	return $date;
	// }



$dbop = new DatabaseOperation;


?>
