<?php

class Users extends Controller
{
    private $userModel;

    public function __construct()
    {

 
        if (isset($_SESSION["elib_user"])){
            $this->userModel = $this->model('User');
            $id = $_SESSION["elib_user"]["id_user"];
            $this->userModel->initialisation($id);// on recupère les infos pour la contruction de l'objet 

        }else{
            header('location:' . URL_ROOT . '/Logins/loginUser');
        }
        

    }

   

    public function dashboard()
    {
       
        $data = [
            "userModel" => $this->userModel,
        ]; //data to be send in the dashboard
        $this->view('user/index', $data);
        
    }



    public function detail(){
     
        if (isset($_REQUEST["id_livre"])){
            $data = [
                "userModel" => $this->userModel,
                "id_livre" =>$_REQUEST["id_livre"]
            ];
    
            $this->view('user/detailLivre/detailLivre_include', $data);
        }else {
            header('location:' . URL_ROOT . '/Users/dashboard');
        }
        
    }

    public function consulterPanier(){
     
        $data = [
            "userModel" => $this->userModel,
        ];

        $this->view('user/consulterPanier/consulterPanier_include', $data);
   
        
    }
        /*
    -	Implémentez des API RESTful pour récupérer des informations sur les livres,
     ajouter/supprimer des livres, ajouter/supprimer des articles du panier.
    */
    public function ajouterPanier(){
     
        if (isset($_REQUEST["id_livre"])){

            $id_livre = $_REQUEST["id_livre"];
            $quantite=addslashes(htmlspecialchars(trim(strval($_POST['quantite'])))); 
           

            $livre = $this->userModel->getLivreById($id_livre)[0]; 

            if ( !isset($_SESSION['panier'])){
                $_SESSION['panier'] = [];
            }

            
            if (!isset($_SESSION['panier'][$id_livre])){
                $_SESSION['panier'][$id_livre] = $quantite;
            }else{
                $_SESSION['panier'][$id_livre] = $_SESSION['panier'][$id_livre] + $quantite;
                if ($_SESSION['panier'][$id_livre] > $livre->QUANTITE){
                    $_SESSION['panier'][$id_livre] = $livre->QUANTITE;
                }
                
            }

      
            $data = [
                "userModel" => $this->userModel,
                "id_livre" =>$_REQUEST["id_livre"]
            ];
    
            $this->view('user/detailLivre/detailLivre_include', $data);
        }else {
            header('location:' . URL_ROOT . '/Users/dashboard');
        }
        
    }
   

    public function supprimerPanier(){
        if (empty($_REQUEST)){
            $data = [
                "userModel" => $this->userModel,
            ];
            header('location:' . URL_ROOT . '/Users/dashboard');
        }
        else{ 
            $id_livre=addslashes(htmlspecialchars(trim(strval($_REQUEST['id_livre'])))); 
            $quantite=addslashes(htmlspecialchars(trim(strval($_REQUEST['quantite'])))); 
           
            if ( isset($_SESSION['panier'])){
                if (isset($_SESSION['panier'][$id_livre])){
                    $_SESSION['panier'][$id_livre] = $_SESSION['panier'][$id_livre] - $quantite;
                    if ( $_SESSION['panier'][$id_livre] <= 0){
                        $_SESSION['panier'][$id_livre] = 0;
                        unset($_SESSION['panier'][$id_livre]);
                    }
                }
                
            }

            
            $data = [
                "userModel" => $this->userModel,
            ];
            $this->view('user/consulterPanier/consulterPanier_include', $data);
   
         
        }
    }


   
     //livre à partir de l'ID
     public function getLivreById(){
        if (empty($_REQUEST)){
            $data = [
                "userModel" => $this->userModel,
                "erreur" => "aucune donnée envoyée",
            ];
            echo json_encode($data);
        }
        else{
            $id_livre=addslashes(htmlspecialchars(trim(strval($_REQUEST['id_livre']))));
         
            $result= $this->userModel->getLivreById($id_livre);
 
            $data = [
                "userModel" => $this->userModel,
                "result" => $result,
            ];  
    
            echo json_encode($data);

           
        }
    }

    //tous les livres
    public function getAllLivres(){
       
        $result= $this->userModel->getAllLivres();

        $data = [
            "userModel" => $this->userModel,
            "result" => $result,
        ];  

        echo json_encode($data);

    }
    public function enregistrerLivre(){
        if (empty($_REQUEST)){
            $data = [
                "userModel" => $this->userModel,
                "erreur" => "aucune donnée envoyée",
            ];
            echo json_encode($data);
        }
        else{
            $titre=addslashes(htmlspecialchars(trim(strval($_REQUEST['titre']))));
            $auteur=addslashes(htmlspecialchars(trim(strval($_REQUEST['auteur']))));
            $description=addslashes(htmlspecialchars(trim(strval($_REQUEST['description']))));
            $quantite=addslashes(htmlspecialchars(trim(strval($_REQUEST["quantite"]))));
            $prix=addslashes(htmlspecialchars(trim(strval($_REQUEST["prix"]))));
            if ( isset($_FILES["image"])){
                $image=$_FILES["image"];
            }else{
                $image=$_FILES;
            }
           
            //127.0.0.1/elibrary/Users/enregistrerLivre?titre=bonjou&auteur=uuhu&description=gyg&prix=78&quantite=8
           
           
            
        
            $result= $this->userModel->enregistrerLivre($titre, $auteur, $description, $quantite, $prix, $image);
 
            $data = [
                "userModel" => $this->userModel,
                "result" => $result,
            ];  
    
            echo json_encode($data);

           
        }
    }

    public function supprimerLivre(){
       
        if (empty($_REQUEST)){
            $data = [
                "userModel" => $this->userModel,
                "erreur" => "aucune donnée envoyée",
            ];
            echo json_encode($data);
        }
        else{
            
            $id_livre=addslashes(htmlspecialchars(trim(strval($_REQUEST['id_livre']))));
           
        
            $result= $this->userModel->supprimerLivre($id_livre);
 
            $data = [
                "userModel" => $this->userModel,
                "result" => $result,
            ];  
    
            echo json_encode($data);

           
        }
    }
   








    public function seDeconnecter()
    {
        if (isset($_SESSION) && isset($_SESSION["elib_user"])) {
            //session_destroy();
            unset($_SESSION["elib_user"]);
        }
        header('location:' . URL_ROOT . '/Logins/loginUser');
    }




}
