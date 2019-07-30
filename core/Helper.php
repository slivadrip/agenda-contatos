<?php

/**
 * Helper.php
 *
 * @author     Adriano Silva <https://adrianosilvapereira.com.br>
 * @copyright  2019 Adriano Silva
 * @version    0.0.1
 */

function view($file, $data = []) {
	extract($data);
	
	require "view/$file";
}