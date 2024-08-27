<?php
$title = 'Evaluation Employe';
ob_start(); 
?>

<div class="container d-flex justify-content-center" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%)">
    <div class="row">
        <div class="card w-100 border-0 bg-light text-dark" style="width: 18rem;box-shadow:0 0 .3rem .04rem #000">
            <div class="card-body">
                <form action="index.php?action=insert" class="form-group" method="POST">
                    <h5 class="card-title text-center">Bienvenue</h5>
                    <h6 class="card-subtitle mb-3 text-muted text-center">Evaluter un(e) employe(e)</h6>
                    <a href="index.php?action=client" class="d-block mb-3 float-left mb-3">Retour</a>
                    
                    <div class="input-group mb-3">
                    <select id="employee" class="form-control" name="employee_id">
                        <?php foreach ($employees as $employee): ?>
                            <option value="<?= htmlspecialchars($employee['id']) ?>">
                                <?= htmlspecialchars($employee['name']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        <input type="text" id="client" class="form-control" name="client" placeholder="Votre Nom" required>
                    </div>

                    <div class="input-group mb-3">
                    <select id="feedback"  class="form-control" name="feedback" required>
                        <option value="5">Tres satisfait</option>
                        <option value="3">Peu satisfait</option>
                        <option value="1">Satisfait</option>
                        <option value="-1">moins satisfait</option>
                        <option value="-3">Insatisfait</option>
                    </select>
                    </div>
                    <button class="btn btn-primary w-100">Soumettre</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once 'layout.php';