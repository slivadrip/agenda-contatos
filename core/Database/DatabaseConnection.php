<?php
/**
 * DatabaseConnection.php
 *
 * @author     Adriano Silva <https://adrianosilvapereira.com.br>
 * @copyright  2019 Adriano Silva
 * @version    0.0.1
 */
namespace Core\Database;

use PDO;
use PDOException;

class DatabaseConnection {
	
	public static function connect () {
		try {
            return new PDO('mysql:host=127.0.0.1;dbname=agenda', 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
		
	}
}