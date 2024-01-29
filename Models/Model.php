<?php

class Model
{
    /**
     * Attribut contenant l'instance PDO
     */
    private $bd;

    /**
     * Attribut statique qui contiendra l'unique instance de Model
     */
    private static $instance = null;

    /**
     * Constructeur : effectue la connexion à la base de données.
     */
    private function __construct()
    {
        include "Controllers\connec.php";
        $this->bd = new PDO('mysql:host='.$HOST.';dbname='.$DB_NAME,$USER,$PASS);
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET nameS 'utf8'");
    }

    /**
     * Méthode permettant de récupérer un modèle car le constructeur est privé (Implémentation du Design Pattern Singleton)
     */
    public static function getModel()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function getLogin($mail, $mdp){
        $requete = $this->bd->prepare('SELECT * FROM adherent WHERE email_adherent = :mail AND mdp_adherent = :mdp');
        $requete->bindValue(':mail', $mail);
        $requete->bindValue(':mdp', $mdp);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }


    public function sign_up($infos){
        $requete = $this->bd->prepare("INSERT INTO `Adherent`(`nom_adherent`, `prenom_adherent`, `telephone_adherent`, `email_adherent`, `mdp_adherent`) 
        VALUES (:nom, :prenom, :phone, :email, :mdp);");
    
        $formulaire_information = ['nom', 'prenom', 'phone', 'email', 'mdp'];
    
        foreach ($formulaire_information as $value_information_formulaire) {
            $requete->bindValue(':' . $value_information_formulaire, $infos[$value_information_formulaire]);
        } 
    
        $requete->execute();
    }

    public function ajout_post($infos){
        $requete = $this->bd->prepare("INSERT INTO `Post`(`id_adherent`, `titre`, `contenue`) 
        VALUES (:id_adherent, :titre, :contenue);");
    
        $formulaire_information = ['id_adherent', 'titre', 'contenue'];
    
        foreach ($formulaire_information as $value_information_formulaire) {
            $requete->bindValue(':' . $value_information_formulaire, $infos[$value_information_formulaire]);
        } 
    
        // Exécuter la requête
        return $requete->execute();
    }
    

    public function getAccueil(){
        $requete = $this->bd->prepare("SELECT * FROM post INNER JOIN adherent on post.id_adherent = adherent.id_adherent ORDER BY date_post DESC");
        $requete->execute();
        return $requete->fetchall(PDO::FETCH_ASSOC);
    }
    

    
}
