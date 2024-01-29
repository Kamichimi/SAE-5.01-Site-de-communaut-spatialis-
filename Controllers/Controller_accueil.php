<?php

class Controller_accueil extends Controller
{
    public function action_acceuil()
    {
        $m = Model::getModel();
        $data = [
                "liste" => $m->getAccueil(),
        ];
        $this->render("forum", $data);
    }

    public function action_ajout_page()
    {
        $this->render("ajout_post");
    }
    
    public function action_ajout_post()
    {
        $m = Model::getModel();
        $data=[
            'titre' => $_POST['titre'],
            'contenue' => $_POST['contenue'],
            'id_adherent' => $_SESSION['id_user']
        ];
        
        if ($m->ajout_post($data)) {
            $data['ajout_post'] = True;
            $this->render("traitement", $data);
        } else {
            $data =["Post non valide"];
            $this->render("ajout_post", $data);
        }
    }

    public function action_default()
    {
        $this->action_acceuil();
    }
}

?>
