<?php require 'header.view.php'; ?>
<div class="container">
	<div class="col-md-12">
		<h1 class="title">Agenda de Contatos</h1>

	</div>

	<div class="row search">
		<div class="col-md-6">
			<a href="/new" class="btn btn-success">Novo Contato</a>

		</div>

		<div class="col-md-6">
			<form class="form-inline form-search" method="POST" action="/find" >
				<div class="form-group mx-sm-3 mb-2">
					<label for="pesquisa" class="sr-only">search</label>
					<input type="text" class="form-control" name="pesquisa" id="pesquisa" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-light mb-2">Buscar</button>
			</form>
		</div>

	</div>


	<div class="row filter">
		<?php foreach (range('A', 'Z') as $letra) { ?>
			<a class="filter-letter" href="filter?name=<?= $letra ?>"><?= $letra ?></a>
		<?php 	}	?>

	</div>


	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nome</th>
				<th scope="col">Telefone</th>
				<th scope="col">E-mail</th>
				<th scope="col">Ação</th>

			</tr>
		</thead>
		<tbody>
			<?php foreach ($contacts as $contact) : ?>

				<tr>
					<th scope="row"><?= $contact->getId(); ?></th>
					<td><?= $contact->getName(); ?></td>
					<td><?= $contact->getPhone(); ?></td>
					<td><?= $contact->getEmail(); ?></td>
					<td>
						<a href="edit?id=<?= $contact->getId(); ?>" class="actions"><i class="fas fa-pencil-alt"></i></a>

						<a href="show?id=<?= $contact->getId(); ?>" class="actions"><i class="fas fa-trash"></i></a>

					</td>

				</tr>

			<?php endforeach ?>


		</tbody>
	</table>


</div>


<?php require 'footer.view.php'; ?>