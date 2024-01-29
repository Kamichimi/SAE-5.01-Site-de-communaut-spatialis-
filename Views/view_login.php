<?php require "view_begin.php"?>

<body class="bg03">
    <?php 
    $tab = ["container","row tm-mt-big","col-12 mx-auto tm-login-col","bg-white tm-block","row","col-12 text-center"];
    foreach($tab as $val) :?>
        <div class="<?= $val?>">
    <?php endforeach ?>
    </br>
    <object data="Content/img/logo_volley.png" width="200" height="200"> </object>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <form 
                 method="post" class="tm-login-form" action="?controller=login&action=verif">
                    <div class="input-group">
                        <label for="Mail" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Mail</label>
                        <input name="Mail" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" id="Mail" placeholder="Mail" required>
                    </div>
                    <div class="input-group mt-3">
                        <label for="Password" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Mot de passe</label>
                        <input name="Password" type="Password" class="form-control validate" id="Password" placeholder="Mot de Passe" required>
                    </div>
                    <div class="input-group mt-3">
                        <button type="submit" class="btn btn-primary d-inline-block mx-auto" name="formlogin">Connexion</button>
                    </div>
                    <?php if(!empty($data)) : ?>
                        <p>Erreur : <?= e($data[0]) ?></p>
                    <?php  endif;?>
                    <div class="input-group mt-3">
                        <p><a href="#">Mot de passe oublié /</a></p>
                        <p><a href="?controller=login&action=sign_page">Créer un Compte</a></p>
                    </div>
                </form>
        
        <?php foreach($tab as $val) :?>
            </div>
        <?php endforeach ?>

        


<?php require "view_end.php"?>
