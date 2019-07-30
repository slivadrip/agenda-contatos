<?php
/**
 * Core.php
 *
 * @author     Adriano Silva <https://adrianosilvapereira.com.br>
 * @copyright  2019 Adriano Silva
 * @version    0.0.1
 */
namespace Core;

class App
{
	
	protected static $registry = [];

	public static function bind ($key, $value) {
		App::$registry[$key] = $value;
	}

	public static function get ($key) {
		return App::$registry[$key];
	}
}