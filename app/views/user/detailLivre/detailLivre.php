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
                            <li class="breadcrumb-item active">detail</li>
                        </ol>
                    </div>

                </div>
            </div>
            <!-- end page title -->
            <?php 
                $userModel = $data['userModel'];
                $id_user = $_SESSION["elib_user"]["id_user"];
                $livre = $userModel->getLivreById($data["id_livre"])[0];    
                $user = $userModel->getUserByID($id_user)[0];
            ?>
            <div class="row mt-2">
                <div class="card">
                    <div class="card-body p-2">
                        <h3 class="page-title text-center m-0 text-primary"><b>Détail sur <?= $livre->TITRE ?></b></h3>
                    </div>
                </div>
            </div>

        

            <div class="card">
					<div class="row g-0">
					  <div class="col-md-2 border-end">
						<img src="<?= URL_ROOT;?>/public/assets/images/livre/<?= $livre->IMAGE ?>" class="img-fluid" alt="...">
						
					  </div>
					  <div class="col-md-8">
						<div class="card-body">
						  <h4 class="card-title"><?= $livre->TITRE ?></h4>
						  <div class="d-flex gap-3 py-3">
							<div class="cursor-pointer">
								<i class='bx bxs-star text-warning'></i>
								<i class='bx bxs-star text-warning'></i>
								<i class='bx bxs-star text-warning'></i>
								<i class='bx bxs-star text-warning'></i>
								<i class='bx bxs-star text-secondary'></i>
							  </div>	
							
						  </div>
						  <div class="mb-3"> 
					 
						</div>
						    <dl class="row">
							<dt class="col-sm-3">Auteur#</dt>
							<dd class="col-sm-9"><?= $livre->AUTEUR ?></dd>

                            <dt class="col-sm-3">Quantité en Stock#</dt>
							<dd class="col-sm-9"><?= $livre->QUANTITE ?></dd>

                            <dt class="col-sm-3">Prix Unitaire#</dt>
							<dd class="col-sm-9"><?= $livre->PRIX ?> EUR</dd>
						  
							<dt class="col-sm-3">Date enregistrement</dt>
							<dd class="col-sm-9"><?= $livre->DATE_ENREGISTREMENT ?></dd>
						  
						  </dl>
						  <hr>
						 
						<div class="d-flex gap-3 mt-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal" >Ajouter au panier</button>

						</div>
						</div>
					  </div>
					</div>
                    <hr/>
					<div class="card-body">
						<ul class="nav nav-tabs nav-primary mb-0" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
									<div class="d-flex align-items-center">
										<div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
										</div>
										<div class="tab-title"> Description du produit </div>
									</div>
								</a>
							</li>
							
						</ul>
						<div class="tab-content pt-3">
							<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
								<p><?= $livre->DESCRIPTION ?></p>
								
							</div>
							
						</div>
					</div>

				  </div>
                       <!-- Modal -->
                       <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
                                
                                <div class="modal-dialog modal-dialog-centered">
                                   
                                    <div class="modal-content">
                                        <form class="" action="<?= URL_ROOT ?>/Users/ajouterPanier" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ajouter le livre <?= $livre->TITRE ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="">Quantité</label>
                                                <input class="form-control" name="quantite" type="number" value="1" required>    
                                            </div>
                                            <input type="text" name="id_livre" value="<?= $livre->ID_LIVRE?>" style="display:none;">
                               
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>

                  <?php 
                    $livres = $userModel->getAllLivres(); 
                    $i = 0;
                    
                
                    ?>

					<h6 class="text-uppercase mb-0">Livres similaires</h6>
					<hr/>
                    <div class="row row-cols-1 row-cols-lg-3">
                        <?php foreach($livres as $livre) :?>
                           
                            <?php if ($livre->ID_LIVRE != $data["id_livre"] && $i <3) :?>
                                <div class="col">
                                    <div class="card">
                                    <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="<?= URL_ROOT;?>/public/assets/images/livre/<?= $livre->IMAGE ?>" width="100" height="150"  class="card-img-top" alt="...">
                                    </div>
                                    <div class="col-md-8"><br>
                                        <div class="card-body">
                                        <h6 class="card-title"><?= $livre->TITRE ?></h6>
                                        <h6 class="card-title"><?= $livre->PRIX ?> EUR</h6>
                                        <div class="cursor-pointer my-2">
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-warning"></i>
                                            <i class="bx bxs-star text-secondary"></i>
                                        </div>
                                       
                                        </div>
                                    </div>
                                    </div>
                                    </div>
						        </div>
                            <?php $i ++ ?>
                            <?php endif ?>
                            
                        <?php endforeach ?>
					
					</div>
					
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