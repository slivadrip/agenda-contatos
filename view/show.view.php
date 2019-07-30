
<?php require 'header.view.php'; ?>
<div class="container">
    <div class="col-md-12">
        <h1 class="title">Deletar Contato</h1>

    </div>

    <div class="row search">
        <div class="col-md-12">
            <a href="/" class="btn btn-success">Lista de Contatos</a>
        </div>
    </div>

    <br>
    <div class="row">
    <div class="col-md-12">

	<form method="POST" action="/delete">
	<input name="id" type="hidden" value="<?= $contact->getId(); ?>" >
    <input type="hidden" name="_method" value="_DELETE">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= $contact->getName(); ?>" placeholder="Nome">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone">Telefone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?= $contact->getPhone(); ?>" placeholder="Telefone">
                </div>

                <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $contact->getEmail(); ?>" placeholder="E-mail">
                </div>
            </div>


           

            <button type="submit" class="btn btn-danger" >Deletar</button>


        </form>

    </div>
    </div>
</div>

<script src="../public/js/mask.js"></script>

<?php require 'footer.view.php'; ?>