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
                 method="post" class="tm-login-form" action="?controller=login&action=sign_traitement" id="form_sign">
                    <div class="input-group">
                        <label for="email" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Mail</label>
                        <input name="email" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" id="email" placeholder="Mail" required>
                    </div>
                    <div class="input-group mt-3">
                        <label for="mdp" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Mot de passe</label>
                        <input name="mdp" type="Password" class="form-control validate" id="mdp" placeholder="Mot de passe" required>
                    </div>
                    <div class="input-group mt-3">
                        <label for="mdp2" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Confirmation du mot de passe</label>
                        <input name="mdp2" type="Password" class="form-control validate" id="mdp2" placeholder="Confirmation du mot de passe" required>
                    </div>
                    </br>
                    <div class="input-group mt-3">
                        <label for="nom" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Nom</label>
                        <input name="nom" type="text" class="form-control validate" id="nom" placeholder="Nom" required>
                    </div>
                    <div class="input-group mt-3">
                        <label for="prenom" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Prénom</label>
                        <input name="prenom" type="text" class="form-control validate" id="prenom" placeholder="Prénom" required>
                    </div>
                    <div class="input-group mt-3">
                        <label for="phone" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Téléphone</label>
                        <input name="phone" type="text" class="form-control validate" id="phone" placeholder="Téléphone" required>
                    </div>
                    <div class="input-group mt-3">
                        <button class="btn btn-primary d-inline-block mx-auto" onclick='window.location.href = "?";'>RETOUR</button>
                        <button type="submit" onclick="checkPassword()" class="btn btn-primary d-inline-block mx-auto" name="formsign">Enregistrer</button>
                    </div>

                </form>

        <script>
            function checkPassword(){
                let form = document.getElementById(form_sign);
                let mdp = document.getElementById(mdp).value;
                let mdp2 = document.getElementById(mdp2).value;

                if (mdp == mdp2){
                    form.submit();
                }
                else{
                    alert("Les mots de passe ne sont pas égaux !");
                }
            }
        </script>
        


<?php require "view_end.php"?>
