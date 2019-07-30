
<?php require 'header.view.php'; ?>
<div class="container">
    <div class="col-md-12">
        <h1 class="title">Editar Contato</h1>

    </div>

    <div class="row search">
        <div class="col-md-12">
            <a href="/" class="btn btn-success">Lista de Contatos</a>
        </div>
    </div>

    <br>
    <div class="row">
    <div class="col-md-12">

	<form method="POST" action="/edit">
	<input name="id" type="hidden" value="<?= $contact->getId(); ?>" >
    <?php
           
       
           if(isset($_SESSION["success"])):
               print $_SESSION["success"];
               unset($_SESSION["success"]);
            endif; 
           
                   ?>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" required maxlength="120" minlength="5" value="<?= $contact->getName(); ?>" placeholder="Nome">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone">Telefone</label>
                    <input type="text" class="form-control" name="phone" id="phone" required maxlength="20" minlength="11" value="<?= $contact->getPhone(); ?>" placeholder="Telefone">
                </div>

                <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required maxlength="100" minlength="5" value="<?= $contact->getEmail(); ?>" placeholder="E-mail">
                </div>
            </div>


           

            <button type="submit" class="btn btn-primary" >Salvar</button>


        </form>

    </div>
    </div>
</div>

<script src="../public/js/mask.js"></script>

<?php require 'footer.view.php'; ?>