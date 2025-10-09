<?php

class Login
{

    private $db;
  


    public function __construct()
    {
        //Instance de connexion a la base de donnees
        $this->db = new Database();
    }





    public function getUser($pseudo, $password)
    {
        $results = [];
        $this->db->query("SELECT * FROM user WHERE EMAIL=:email");
        $this->db->bind(':email', $pseudo);
        $user = $this->db->single();
        $nbOne = $this->db->rowCount();
        if ($nbOne == 1) {
            if ($password == $user->MOT_DE_PASSE) {
                $results = [
                    'user' => $user,
                    'error' => '',
                ];
            }else{
                $results = [
                    'user' => '',
                    'error' => "<b class='text-danger mb-5'>Identifiants incorrects</b>",
                ];
            }
        } else {
            $results = [
                'user' => '',
                'error' => "<b class='text-danger mb-5'>Identifiants incorrects</b>",
            ];
        }

        return $results;
    }




    

 
}
