<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            <div class="">
                <img src="<?= URL_ROOT; ?>/public/assets/images/logo.jpg" class=" ms-3" width="120" height="35"  alt="" />
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                   
                  
                    <li class="nav-item dropdown dropdown-large">
                        <?php if (isset($_SESSION['panier']) ): ?>
                           
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count"><?= sizeof($_SESSION['panier']); ?></span>
                                <i class='bx bx-bell'></i>
                            </a>
                        <?php else: ?>  
                           
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">0</span>
                                <i class='bx bx-bell'></i>
                            </a>
                        <?php endif ?>

                        
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="<?= URL_ROOT;?>/Users/consulterPanier">
                                <div class="msg-header">
                                    <p class="msg-header-title">Votre panier</p>
                                  <p class="msg-header-clear ms-auto">Consulter</p>
                                </div>
                            </a>
                            
                                <?php 
                                 $userModel = $data['userModel'];
                               if (isset($_SESSION["panier"])){
                                $panier = array_keys($_SESSION['panier']); 
                               }else{
                                $panier = [];
                               } ?>
                            <div class="header-notifications-list">
                                <?php foreach($panier as $id_livre) :?>
                                    <?php  $livre = $userModel->getLivreById($id_livre)[0];  ?>
                                
                                        <div class=" dropdown-item d-flex align-items-center">
                                            <div class="notify bg-light-primary text-primary"> <img src="<?= URL_ROOT;?>/public/assets/images/livre/<?= $livre->IMAGE ?>" class="card-img-top" width="" height="50" alt="...">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name"><?= $livre->TITRE ?><span class="msg-time float-end">14 Sec
                                            ago</span></h6>
                                                <p class="msg-info"><?= $livre->AUTEUR ?></p>
                                            </div>
                                        </div>
                                       
                                      
                            
                              
                                <?php endforeach ?>
                                
                               
                            </div>
                            <a href="<?= URL_ROOT;?>/Users/consulterPanier">
                                <div class="text-center msg-footer">Consulter votre panier</div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <div class="header-message-list"></div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <?php
                        $userModel = $data['userModel']; 
                         ?>
                    <img src="<?= URL_ROOT;?>/public/assets/images/profil/user/<?= $data["userModel"]->getImage() ?>" class="user-img" alt="user avatar">
                    <div class="user-info ps-3 ">
                        
                        <p class="user-name mb-0"><?= $userModel->getNom(); ?></p>
                        <p class="designattion mb-0"><?= $_SESSION["elib_user"]["email"] ?></p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    
                    <li><a class="dropdown-item" href="<?= URL_ROOT?>/Users/dashboard"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item" href="<?= URL_ROOT?>/Users/seDeconnecter"><i class='bx bx-log-out-circle'></i><span>Déconnecter</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>