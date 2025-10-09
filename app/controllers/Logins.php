<?php

class Logins extends Controller
{   
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = $this->model('Login');
    }

    //fonction pour ouvrir la page de connexion pour les users
    public function loginUser()
    {
        $data = [];
        $this->view('login/user/login_index',$data);
    }
    
    public function seConnecterUser(){
        if (isset($_POST['loginUser'])) {
            $email = htmlspecialchars(htmlentities(trim($_POST['email'])));
            $password = htmlspecialchars(htmlentities(trim($_POST['password'])));

            $data = [];

            //Verifie si la taille du mot de passe est superieur a 8
           
            $password = sha1($password);
                
                
            $users = $this->loginModel->getUser($email, $password);
            if (!empty($users['user'])) {
                $email = $users['user']->EMAIL;
                $id_user = $users['user']->ID_USER;
                $_SESSION["elib_user"] = [
                    "email" => $email,
                    "id_user" => $id_user,
                ];
                
        
                header('location:' . URL_ROOT . '/Users/dashboard');
            }else{
                $data = [
                    "result" => $users['error'],
                ];
                $this->view('login/user/login_index',$data);
                
            }
        
        }else{
            $this->view('home/index');
        }

    }

  


}
