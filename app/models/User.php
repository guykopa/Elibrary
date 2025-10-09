<?php

use MeSomb\Operation\PaymentOperation;
use MeSomb\Util\RandomGenerator;
  
class User
{

    private $db;
    private $id_user;
    private $nom;
    private $email;
    private $image;


    public function __construct()
    {
        //Instance de connexion a la base de donnees
        $this->db = new Database();
    }

    public function initialisation($id)
    {  
        $this->db->query("SELECT * FROM user WHERE ID_USER=$id ");
        $queryresult = $this->db->execute();
        if($queryresult===TRUE){
            $objet = $this->db->resultSet();
            // on recupere alors tous les attributs
    
            $this->id_user = $objet[0]->ID_USER;
            $this->nom = $objet[0]->NOM;
            $this->email = $objet[0]->EMAIL;
            $this->image = $objet[0]->IMAGE;

            // on renvoit true pour dire que tout est bon
            return TRUE;
        }
    }

    public function getIdUser(){
        return $this->id_user;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getImage(){
        return $this->image;
    }
    public function getEmail(){
        return $this->email;
    }
    

    //tous les utilisateurs
    public function getAllUsers(){
        //requete
        $this->db->query("SELECT * FROM user ORDER BY `ID_USER` ASC ");
        $result = $this->db->resultSet();
        return $result;
    }
    //tous utilisateur à partir de l'id
    public function getUserById($id_user){
        //requete
        $this->db->query("SELECT * FROM user WHERE ID_USER='$id_user' ");
        $result = $this->db->resultSet();
        return $result;
    }


    //livre à partir de l'ID
    public function getLivreById($id_livre){
        //requete
        $this->db->query("SELECT * FROM livre WHERE ID_LIVRE='$id_livre' ");
        $result = $this->db->resultSet();
        return $result;
    }

    //tous les livres
    public function getAllLivres(){
        //requete
        $this->db->query("SELECT * FROM livre ORDER BY `ID_LIVRE` ASC ");
        $result = $this->db->resultSet();
        return $result;
    }






    public function removeAccents($str) {
        // Translittération des caractères accentués en caractères non accentués
        $transliteratedStr = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    
        // Suppression des caractères accentués restants avec une expression régulière
        $cleanStr = preg_replace('/[^a-zA-Z0-9\s]/', '', $transliteratedStr);
    
        return $cleanStr;
    }

    public function insererCaractere($chaine, $caractere, $indice) {
        $partieAvant = substr($chaine, 0, $indice);
        $partieApres = substr($chaine, $indice);
        $nouvelleChaine = $partieAvant . $caractere . $partieApres;
        return $nouvelleChaine;
    }

    //ajouter livre
    public function enregistrerLivre($titre, $auteur, $description, $quantite, $prix, $nom_image){

        if (isset($nom_image["name"])){
            $nom_image_ = htmlspecialchars(trim($nom_image["name"]));
        }else{
            $nom_image_ = null;
        }
         
    

        // On copie la photo de la competence dans le dossier image
        if ($nom_image_){
            $nom_image_ = $this->removeAccents($nom_image_);
            $nom_image_ = $this->insererCaractere($nom_image_, '.', strlen($nom_image_)-3);
            move_uploaded_file($nom_image['tmp_name'],  PUBLIC_ROOT."/assets/images/livre/" . $nom_image_);
        
        }else{
            $nom_image_ = "default.png";
        }
         


        $table = "livre";
        $date_enregistrement = Date('y-m-d h:i:s');

        //Si la competence existe dans la table en question
        $this->db->query("SELECT * FROM $table WHERE  TITRE='$titre' ");
        $result = $this->db->resultSet();
        $row = $this->db->rowCount();

        if ($row > 0) {
            $result = "<h4 style='color:red; font-size: 18px;' >Ce livre existe déjà</h4>";
        } else {

            $this->db->query("INSERT INTO $table (  `TITRE`, `AUTEUR`, `DESCRIPTION`, `QUANTITE`, `PRIX`, `IMAGE`, `DATE_ENREGISTREMENT`) 
                                VALUES 
                                (  '$titre', '$auteur', '$description', '$quantite', '$prix', '$nom_image_', '$date_enregistrement');");
            $isOk = $this->db->execute();

            if ($isOk == true) {
                $result = "<h4 style='color:green; font-size: 18px;' >Livre enregistrée</h4>";
                //l'insertion c'est bien passee
            } else {
                //si on a pas effectuer une insertion 
                $result = "<h4 style='color:red; font-size: 18px;' >erreur interne</h4>";
            }

        }
                   
        return $result;
    }

    // supprimer une livre
    public function supprimerLivre($id_livre){
        $table = 'livre'; //nom de la table 

        $this->db->query("DELETE FROM $table WHERE ID_LIVRE='$id_livre'");
        $isOk = $this->db->execute();

        if ($isOk == true) {
            $result = "<h4 style='color:green; font-size: 18px;'>Livre supprimé avec succès</h4>";
            //l'insertion c'est bien passee
        } else {
            //si on a pas effectuer une insertion 
            $result = "<h4 style='color:red; font-size: 18px;'> une erreur interne est survenue</h4>";
        }
        
        return $result;

    } 
}
