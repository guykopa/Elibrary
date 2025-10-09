
<?php require_once APP_ROOT . '/views/includes/user/header.php';?>
<?php require_once APP_ROOT . '/views/includes/user/sidebar.php';?>
<?php require_once APP_ROOT . '/views/includes/user/navbar.php';?>



<?php require_once APP_ROOT . '/views/user/home.php';?>

<?php require_once APP_ROOT . '/views/includes/user/footer.php';?>

 <!--plugins-->
<script src="<?= URL_ROOT; ?>/public/assets/js/jquery.min.js"></script>
<script src="<?= URL_ROOT; ?>/public/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?= URL_ROOT; ?>/public/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="<?= URL_ROOT; ?>/public/assets/plugins/simplebar/js/simplebar.min.js"></script>


<!--app JS-->
<script src="<?= URL_ROOT; ?>/public/assets/js/app.js"></script>

 <!-- Bootstrap JS -->
<script src="<?= URL_ROOT; ?>/public/assets/js/bootstrap.bundle.min.js"></script>



<script src="<?= URL_ROOT; ?>/public/assets/js/chart.js"></script>

<script>
    

    // configuration du dashbord 
    function convertStringToArray(data){
        // la variable data contient le nombre d'hopital enregistré par mois au cours de l'année
        //mais il est sous forme de chaine de caractère ou les nombres sont séparés par des point
        //cet algorithme permet de trasformer cette chaine en tableau
        tab = [];
        i=0;
        nbr = "";
        while (i<data.length){    
            if (data[i] == "."){
                tab.push(nbr);
                nbr = "";
            }else{
                nbr = nbr + data[i];
            }
            i++;
        }
        return tab;
    }
    $.ajax({
            url: '<?= URL_ROOT; ?>/Ets/getNombreEtCommuneEtablissementParMois',
            type: 'post',
            data: {},
            success: function(data) {

                data_split = data.split(" ");

                datac = data_split[0];

                datae = data_split[1]
            
                const labels = [
                    'Janvier',
                    'Fevrier',
                    'Mars',
                    'Avril',
                    'Mai',
                    'Juin',
                    'Juillet',
                    'Août',
                    'Septembre',
                    'Octobre',
                    'Novembre',
                    'Decembre'
                ];
            
                const tab1 = convertStringToArray(datac);
                const tab2 = convertStringToArray(datae);
                

                const data2 = {
                    labels: labels,
                    datasets: [
                    {
                        label: 'Nombre etablissements enregistré  par mois au cours de l\'année ' + new Date().getFullYear(),
                        backgroundColor: 'rgb(255, 12, 17)',
                        borderColor: 'rgb(255, 12, 17)',
                        data: tab2,
                    }]
                };
                
               


                const config2 = {
                    type: 'line',
                    data: data2,
                    options: {
                        layout: {
                            paddind: 60
                        }
                    }
                };
         

                const linechart = new Chart(
                    document.getElementById('linechart'),
                    config2
                );
           
            

            }
    });
    
 
</script>



</body>

</html>