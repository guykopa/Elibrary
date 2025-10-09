<?php
//Chargement des modeles et des vues
class Controller
{
    /**
     * 
     */
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        //Instance du model 

        return new $model();
    }

    public function view($view, $data = [], $ancre="")
    {
        //Recherce de la vue
        if (file_exists('../app/views/' . $view . '.php')) { 
            require_once '../app/views/' . $view . '.php';
            ?>
                <script> 
                    var ancre = <?php echo json_encode($ancre); ?>;
                    if (ancre){
                        alert(ancre);
                        $('html,body').animate({
                            scrollTop:$(ancre).position().top},
                            1000
                        );
                    }
                </script>
            <?php

        } else {
            echo "Cette page n'existe pas: Erreur 404";
        }
    }
}
?>

