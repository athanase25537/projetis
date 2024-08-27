<?php
$title = 'Acceuil - Client';
ob_start(); 
?>

<div class="container text-white" style="margin-top: 5rem">
    <div class=" jumbotron jumbotron-fluid m-5">
        <div class="container m-2">
            <h1 class="display-4">Quel service peut-on vous aider ?</h1>
            <p class="lead">Veuillez choisier le(s) service(s) que vos vouler</p>
        </div>
    </div>
    <div class="row col-lg-12 g-4 py-5 text-center m-5 mb-0">
        <div class="col text-center m-2">
            <div id="architecte" class="card cardo" style="width:18rem;">
                <div class="card-img-top">
                    <img src="../src/assets/image/architect.png" class="w-100 h-100" alt="carousel">
                </div>
                
                <div class="card-body">
                    <h5 class="card-title">Architecte</h5>
                    <p class="card-text">Conçoit les plant et les dessin du bâtiment, en tenant compte des aspects esthétiques, fonctionnels</p>
                </div>
            </div>
        </div>
        <div class="col text-center m-2">
            <div id="macon" class="card cardo" style="width:18rem;">
                <div class="card-img-top">
                    <img src="../src/assets/image/macon.jpg" class="w-100 h-100" class="card-img-top" alt="carousel">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Maçon</h5>
                    <p class="card-text">Effectue les travaux de construction en briques, pierres,parpaings, et des autres matériaux.</p>
                </div>
            </div>
        </div>
        <div class="col text-center m-2">
            <div id="peintre" class="card cardo" style="width:18rem;">
                <div class="card-img-top">
                    <img src="../src/assets/image/peintre.png" class="w-100 h-100" class="card-img-top" alt="carousel">
                </div>
                
                <div class="card-body">
                    <h5 class="card-title">Peintre</h5>
                    <p class="card-text">Responsable des finitions, applique la peinture, les enduits et les revêtement muraux</p>
                </div>
            </div>
        </div>
        <div class="col text-center m-2">
            <div id="menuisier" class="card cardo" style="width:18rem;">
                <div class="card-img-top">
                    <img src="../src/assets/image/menuisier.png" class="w-100 h-100" class="card-img-top" alt="carousel">
                </div>
            
                <div class="card-body">
                    <h5 class="card-title">Menuisier</h5>
                    <p class="card-text">Fabrique et installe des éléments en bois comme les portes, fenêtres, placards, et autres aménagement intérieurs</p>
                </div>
            </div>
        </div>
        <div class="col text-center m-2">
            <div id="electricien" class="card cardo" style="width:18rem;">
                <div class="card-img-top">
                    <img src="../src/assets/image/electricien.png" class="w-100 h-100" class="card-img-top" alt="carousel">
                </div>
                
                <div class="card-body">
                    <h5 class="card-title">électricient</h5>
                    <p class="card-text">Installe les systemes éléctriques, y compris le cablâge,les panneaux éléctriques, et les dispositifs de sécurité.</p>
                </div>
            </div>
        </div>
        <div class="col text-center m-2">
            <div id="chefChantier" class="card cardo" style="width:18rem;">
                <div class="card-img-top">
                    <img src="../src/assets/image/chefchantier.png" class="w-100 h-100" class="card-img-top" alt="carousel">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Chef de chantier</h5>
                    <p class="card-text">Supervise les traveaux sur le site,coordone les équipes et assure que le projet respecte les délais et le budget </p>
                </div>
            </div>
        </div>

    </div>

    <button id="btnConfirm" class="btn btn-primary m-5 mt-0">Confirmer</button>

    <hr>
    <div class="jumbotron jumbotron-fluid m-5">
        <div class="container m-2">
            <h1 class="display-4">Vous pouvez evaluer nos employes</h1>
            <p class="lead">Votre avis sera tres important pour l'evolution de nos tres chers employes</p>
        </div>
        <a class="btn btn-success my-2 my-sm-0 m-4"  href="index.php?action=evaluation">Evaluer employe</a>
    </div>
</div>

<i class="basket fa-solid fa-basket-shopping text-white"><div class="bg-danger text-white d-flex justify-content-center align-items-center"></div></i>

<script>
    let cards = document.querySelectorAll('.cardo');
    let basket = document.querySelector('.basket');
    let numberContainer = document.createElement('div');
    let div = basket.firstElementChild;
    numberContainer.textContent = '0';
    div.appendChild(numberContainer);
    let cmds = [];
    for(let i=0; i<cards.length; i++) {
        cards[i].addEventListener('click', function () {
            this.classList.toggle('active');
            if(!cmds.includes(this.id)) {
                cmds.push(this.id);
                let cmd = document.createElement('div');
                cmd.textContent = this.id;
                cmd.classList.add(this.id);
                div.appendChild(cmd);
            } else {
                cmd = document.querySelector(`.${this.id}`);
                div.removeChild(cmd);
                cmds.splice(cmds.indexOf(this.id), 1);
            }

            numberContainer.textContent = cmds.length;
        })
    }

    basket.addEventListener('click', function () {
        div.classList.toggle('show');
    });
</script>
<?php
$content = ob_get_clean();
require_once 'layout.php';