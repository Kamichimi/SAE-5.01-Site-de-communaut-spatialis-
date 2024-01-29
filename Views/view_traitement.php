<?php
    if (isset($data['compte_valide'])){
        if ($data['compte_valide']){
            header("location:?controller=accueil");
        }
        else{
            header("location:?controller=login");
        }
    } else {
        header("location:?controller=login");
    }

    if (isset($data['ajout_post'])){
        if ($data['ajout_post']){
            header("location:?controller=accueil");
        }
        else{
            header("location:?controller=accueil");
        }
    } else {
        header("location:?controller=accueil");
    }
?>