<?php
$title = 'Login';
ob_start(); 
?>

<div class="container d-flex justify-content-between" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%)">
    <div class="row mr-2 text-white" style="width: 65%">
        <h1>Besoin d'aide pour votre construction ?</h1>
        <h5>Nous sommes une entreprise qui s'occupe de tout ce qui est construction.
        N'hesiter surtout pas de visiter notre site et faire vos demandes.
        C'est un plaisir de collaborer avec vous</h5>
    </div>
    <div class="row w-45">
            <div class="card w-100 border-0 bg-light text-dark" style="width: 18rem;">
                <div class="card-body">
                    <form action="index.php?action=login" class="form-group" method="post">
                        <h5 class="card-title text-center">Bienvenue</h5>
                        <h6 class="card-subtitle mb-5 text-muted text-center">Se connecter en tant <br> qu'admin</h6>
                        <?php if(!empty($_GET)): ?>
                            <?php if($_GET['action'] == 'login' && !empty($_GET['status'])): ?>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <div>Pseudo ou mot de passe incorrecte :(</div>
                            </div>
                            <?php endif ?>
                        <?php endif ?>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Pseudo" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Mot de Passe" required>
                        </div>
                        <a href="index.php?action=client" class="btn btn-primary float-left mb-3">Je suis un(e) client(e)</a>
                        <button class="btn btn-secondary float-end">S'identifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
$content = ob_get_clean();
require_once 'layout.php';