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
                 method="post" class="tm-login-form" action="?controller=accueil&action=ajout_post" id="form_sign">
                    <div class="input-group">
                        <label for="titre" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Titre</label>
                        <input name="titre" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" id="titre" placeholder="Titre du Sujet" required>
                    </div>
                    <div class="input-group mt-3">
                        <label for="contenue" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Contenue</label>
                        <textarea name="contenue" class="form-control validate" id="contenue" placeholder="bla bla blaaa bla" required></textarea>
                    </div>
                    <div class="input-group mt-3">
                    <button class="btn btn-primary d-inline-block mx-auto" onclick='window.location.href = "?controller=accueil";'>RETOUR</button>
                        <button type="submit" class="btn btn-primary d-inline-block mx-auto" name="formsign">POSTER</button>
                    </div>
                </form>
            </div>
        </div>


        


<?php require "view_end.php"?>
