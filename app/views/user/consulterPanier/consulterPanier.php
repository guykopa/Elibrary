<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="page-wrapper">
    <div class="page-content">
         <!-- Start Content-->
        <div class="container-fluid">
           <!-- start page title -->
           <div class="row">
                <div class="col-12">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= URL_ROOT; ?>/Users/dashboard"><?= SITE_NAME ?></a></li>
                            <li class="breadcrumb-item active">Panier</li>
                        </ol>
                    </div>

                </div>
            </div>
            <!-- end page title -->
            <?php 
                $userModel = $data['userModel'];
                $id_user = $_SESSION["elib_user"]["id_user"];  
                $user = $userModel->getUserByID($id_user)[0];

                $panier = [];
                $montant_total = 0;
                
                if (isset($_SESSION['panier'])){
                    $i = 0;
                    $keys = array_keys($_SESSION['panier']); 

                    foreach($keys as $key){
                        $qte = $_SESSION['panier'][$key]; 
                        $l = $userModel->getLivreById($key)[0];
                        $montant_total = $montant_total + $l->PRIX * $qte;
                       
                        $tab_livres = [
                            "livre" => $l,
                            "quantite" => $qte,
                            "prix" => $l->PRIX * $qte,
                        ];
                        array_push($panier, $tab_livres);
                    }
                    
                }
                
            ?>
            <div class="row mt-2">
                <div class="card">
                    <div class="card-body p-2">
                        <h3 class="page-title text-center m-0 text-primary"><b>Votre Panier contient <?= sizeof($panier)?> livre(s)</b></h3>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <form action="#" method="post">
                    <input type="submit" value="Valider la commande: (<?= $montant_total ?>) EUR" name="" class="text-white btn btn-success .round-pill waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#scrollable-modal" value="" id="" >
                </form>
            </div><br>


        
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
                    <?php if (sizeof($panier) > 0) : ?>
                        <?php foreach ($panier as $elt_panier) : ?>
                            <?php $livre = $elt_panier['livre']; ?>
                            <div class="col">
                                <div class="card">
                                    <img src="<?= URL_ROOT;?>/public/assets/images/livre/<?= $livre->IMAGE ?>" class="card-img-top" width="100" height="300"  alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">TITRE: <span class="text-primary"><?= $livre->TITRE ?></span></h5>
                                        <h5 class="card-title">AUTEUR: <span class="text-primary"><?= $livre->AUTEUR ?></span></h5>
                                        <h5 class="card-title">QUANTITE: <span class="text-primary"><?= $elt_panier['quantite'] ?></span></h5>
                                        <h5 class="card-title">PRIX TOTAL: <span class="text-primary"><?= $elt_panier['prix'] ?> EUR</span></h5>
                                        <br>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal<?= $livre->ID_LIVRE ?>" >Supprimer du panier</button>

                                       
                                    </div>
                                </div>
                            </div>

                             <!-- Modal -->
                            <div class="modal fade" id="exampleVerticallycenteredModal<?= $livre->ID_LIVRE ?>" tabindex="-1" aria-hidden="true">
                                
                                <div class="modal-dialog modal-dialog-centered">
                                   
                                    <div class="modal-content">
                                        <form class="" action="<?= URL_ROOT ?>/Users/supprimerPanier" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Enlever l'article <?= $livre->TITRE ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="">Quantité</label>
                                                <input class="form-control" name="quantite" type="number" value="1" required>    
                                            </div>
                                            <input type="text" name="id_livre" value="<?= $livre->ID_LIVRE?>" style="display:none;">
                               
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Enlever</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
					    
                        <?php endforeach ?>
                    <?php endif ?>
					
			</div>
            <!-- Button trigger modal -->
            
           
					
            <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->
</div>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


<!-- 
    <div class="mb-3">
        <label for="image" class="form-label">Choisir l'image</label>
        <input type="file" data-plugins="dropify" data-max-file-size="1M" />
        
    </div>
-->