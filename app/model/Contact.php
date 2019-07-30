<?php

/**
 * Contact.php
 *
 * @author     Adriano Silva <https://adrianosilvapereira.com.br>
 * @copyright  2019 Adriano Silva
 * @version    0.0.1
 */

namespace App\Model;

class Contact
{
	private $id;
	private $name;
	private $phone;
	private $email;

	public function getId () {
		return $this->id;
	}

	public function getName () {
		return $this->name;
	}
	
	public function getPhone() {
		return $this->phone;
	}

	public function getEmail () {
		return $this->email;
	}
}