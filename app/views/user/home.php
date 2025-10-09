<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!-- Start Content-->
        <div class="container-fluid">
             <!-- start page title -->
             <div class="row">
                <div class="col-12">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?=URL_ROOT?>/Users/dashboard"><?= SITE_NAME ?></a></li>  
                        </ol>
                    </div>

                </div>
            </div>

            <?php 
                $userModel = $data['userModel'];
                $id_user = $_SESSION["elib_user"]["id_user"];
                $livres = $userModel->getAllLivres();     
                $user = $userModel->getUserByID($id_user)[0];
            ?>
             

            <div class="row mt-2">
                <div class="card">
                    <div class="card-body p-2">
                        <h3 class="page-title text-center m-0 text-primary"><b>Livres disponibles</b></h3>
                    </div>
                </div>
            </div>


            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 product-grid">
                <?php foreach($livres as $livre) :?>
                    <a href="<?= URL_ROOT;?>/Users/detail?id_livre=<?= $livre->ID_LIVRE ?>">
                        <div class="col">
                            <div class="card">
                                <img src="<?= URL_ROOT;?>/public/assets/images/livre/<?= $livre->IMAGE ?>" class="card-img-top" width="100" height="300" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title cursor-pointer">TITRE: <?= $livre->TITRE ?></h6>
                                    <h6 class="card-title cursor-pointer">AUTEUR: <?= $livre->AUTEUR ?></h6>
                                    <h6 class="card-title cursor-pointer">PRIX: <?= $livre->PRIX ?> EUR</h6>
                                    
                                    <div class="d-flex align-items-center mt-3 fs-6">
                                        <div class="cursor-pointer">
                                        <i class='bx bxs-star text-warning'></i>
                                        <i class='bx bxs-star text-warning'></i>
                                        <i class='bx bxs-star text-warning'></i>
                                        <i class='bx bxs-star text-warning'></i>
                                        <i class='bx bxs-star text-secondary'></i>
                                        </div>	
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            
            </div><!--end row-->

    </div>
</div>
<!--end page wrapper -->

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->



 <!--start switcher-->
 <div class="switcher-wrapper">
    <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
    </div>
        <div class="switcher-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0 ">Thèmes</h5>
            <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
        </div>
        <hr/>
        <div class="d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                <label class="form-check-label" for="lightmode">Light</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                <label class="form-check-label" for="darkmode">Dark</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                <label class="form-check-label" for="minimaltheme">Minimal</label>
            </div>
        </div>
        <hr/>
    </div>
</div>
<!--end switcher-->

