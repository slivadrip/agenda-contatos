<?php
/**
 * QueryBuilder.php
 *
 * @author     Adriano Silva <https://adrianosilvapereira.com.br>
 * @copyright  2019 Adriano Silva
 * @version    0.0.1
 */

namespace Core\Database;

use PDO;
use App\Model\Contact;

class QueryBuilder 
{
	
	private $pdo;

	public function __construct($connection) 
	{
		$this->pdo = $connection;
	}

	public function selectAll($table) 
	{
		$statement = $this->pdo->prepare("SELECT * FROM {$table}");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_CLASS, Contact::class);
	}

	public function selectWhere($table, $data) 
	{
		$dataKeys = array_keys($data);
		$strKeys = implode(',', $dataKeys);
		$strData = implode(',', $data);

		$statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$strKeys} = {$strData}");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_CLASS, Contact::class);
	}

	public function selectLike($table, $data) 
	{
		$dataKeys = array_keys($data);
		$strKeys = implode(',', $dataKeys);
		$strData = implode(',', $data);
		$strData = str_replace("'","",$strData);

		$strData = "'%".$strData."%'";

		$statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$strKeys} LIKE {$strData}");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_CLASS, Contact::class);
	}

	public function selectLetter($table, $data) 
	{
		$dataKeys = array_keys($data);
		$strKeys = implode(',', $dataKeys);
		$strData = implode(',', $data);
		$strData = str_replace("'","",$strData);

		$strData = "'".$strData."%'";

		$statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$strKeys} LIKE {$strData}");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_CLASS, Contact::class);
	}

	public function insertData($table, $data) {
		$dataKeys = array_keys($data);
		$strKeys = implode(',', $dataKeys);
		$strData = implode(',', $data);

		$statement = $this->pdo->prepare("INSERT INTO {$table}({$strKeys}) VALUE({$strData})");
		$statement->execute();
	}

	public function updateData($table, $condition, $data) {

		$conditionKeys = array_keys($condition);
		$strConditionKeys = implode(',', $conditionKeys);
		$strConditionData = implode(',', $condition);

		$dataKeys = array_keys($data);
		$strKeys = implode(',', $dataKeys);
		$strData = implode(',', $data);

		foreach($data as $fields => $values){
			$campos[] = "$fields = $values";
		}
		
		$strData = implode(',', $campos);
		$statement = $this->pdo->prepare("UPDATE {$table} SET {$strData} WHERE {$strConditionKeys} = {$strConditionData}");
		$statement->execute();
	}

	public function deleteData($table, $data) {
		$dataKeys = array_keys($data);
		$strKeys = implode(',', $dataKeys);
		$strData = implode(',', $data);

		$statement = $this->pdo->prepare("DELETE FROM {$table} WHERE {$strKeys} = {$strData}");
		$statement->execute(); 
	}
}