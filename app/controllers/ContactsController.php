<?php

/**
 * ContactsController.php
 *
 * @author     Adriano Silva <https://adrianosilvapereira.com.br>
 * @copyright  2019 Adriano Silva
 * @version    0.0.1
 */

namespace App\Controllers;

use Core\App;

class ContactsController
{
	public function __construct()
	{
		session_start();
	}

	public function index()
	{
		$contacts = App::get('database')->selectAll('contacts');
		view('index.view.php', ['contacts' => $contacts]);
	}

	public function find()
	{
		$pesquisa = $_POST['pesquisa'];
		$contacts = App::get('database')->selectLike('contacts', [
			'name' => "'$pesquisa'"
		]);
		view('index.view.php', ['contacts' => $contacts]);
	}


	public function filter()
	{
		if (isset($_GET['name'])) {

			$name = $_GET['name'];

			$contacts = App::get('database')->selectLetter('contacts', [
				'name' => "'$name'"
			]);
			view('index.view.php', ['contacts' => $contacts]);
		}
	}


	public function new()
	{
		view('new.view.php');
	}

	public function store()
	{
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];

		if (empty($name) || empty($phone) || empty($email)) {
			$_SESSION["success"] = "
			<div class='alert alert-danger' role='alert'>
			 Todos os campos são obrigatórios !!</div>
			";
			header('Location: /new');
		}

		App::get('database')->insertData('contacts', [
			'id' => 0,
			'name' => "'$name'",
			'phone' => "'$phone'",
			'email' => "'$email'"
		]);



		$_SESSION["success"] = "
		<div class='alert alert-success' role='alert'>
         Contato cadastrado com Sucesso!!</div>
		";

		header('Location: /new');
	}

	public function edit()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$contact = App::get('database')->selectWhere('contacts', ['id' => "'$id'"]);

			if (sizeof($contact) > 0) {
				view('edit.view.php', ['contact' => $contact[0]]);
			} else {
				header('Location: /');
			}
		} else {
			header('Location: /');
		}
	}

	public function update()
	{
		if (isset($_POST['id']) && isset($_POST['name'])) {
			$id = $_POST['id'];

			$name = $_POST['name'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];

			$data = [
				'name' => "'$name'",
				'phone' => "'$phone'",
				'email' => "'$email'"
			];

			$contact = App::get('database')->updateData('contacts', ['id' => "'$id'"],  $data);
		}

		$_SESSION["success"] = "
		<div class='alert alert-success' role='alert'>
         Contato atualizado com Sucesso!!</div>
		";

		header('Location: /edit?id=' . $id);
	}

	public function show()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$contact = App::get('database')->selectWhere('contacts', ['id' => "'$id'"]);

			if (sizeof($contact) > 0) {
				view('show.view.php', ['contact' => $contact[0]]);
			} else {
				header('Location: /');
			}
		} else {
			header('Location: /');
		}
	}

	public function delete()
	{
		$id = $_POST['id'];
		$contacts = App::get('database')->deleteData('contacts', ['id' => "'$id'"]);
		header('Location: /');
	}
}
