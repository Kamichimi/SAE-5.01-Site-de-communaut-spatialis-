<?php

class Controller_jeu extends Controller
{
    public function action_jeu()
    {
        $data = [];
        $this->render("jeu", $data);
    }

    public function action_default()
    {
        $this->action_jeu();
    }
}

?>
