<?php

class Controller_login extends Controller
{
    public function action_login_page()
    {
        $this->render("login");
    }

    public function action_verif()
    {
        $m = Model::getModel();
        $mail = $_POST['Mail'];
        $mdp = $_POST['Password'];
        
        if ($res = $m->getLogin($mail, $mdp)) {
            $data['compte_valide'] = True;
            $_SESSION['id_user'] = $res['id_adherent'] ;
            $this->render("traitement", $data);
        } else {
            $data =["Mail ou mot de passe incorrect"];
            $this->render("login", $data);
        }
    }

    public function action_sign_page()
    {
        $this->render("sign");
    }

    public function action_sign_traitement()
    {
        $m = Model::getModel();

        $infos=[];
        $infos['email'] = $_POST['email'];
        $infos['mdp'] = $_POST['mdp'];
        $infos['nom'] = $_POST['nom'];
        $infos['prenom'] = $_POST['prenom'];
        $infos['phone'] = $_POST['phone'];

        $a = $m->sign_up($infos);

        $this->render("sign");
    }

    public function action_default()
    {
        $this->action_login_page();
    }
}
?>