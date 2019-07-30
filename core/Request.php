<?php
/**
 * Request.php
 *
 * @author     Adriano Silva <https://adrianosilvapereira.com.br>
 * @copyright  2019 Adriano Silva
 * @version    0.0.1
 */
namespace Core;

class Request
{
	public static function uri () {
		return explode('?', $_SERVER['REQUEST_URI'])[0];
	}

	public static function method () {
		return $_SERVER['REQUEST_METHOD'];
	}
}