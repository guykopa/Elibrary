<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

             
                <div class="account-pages my-5 pt-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <div class="card overflow-hidden">
                                    <div style="background-color:#0598ff;" class="">
                                        <div class="text-primary text-center p-4">
                                            <h5 class="text-white font-size-20">e-Library !</h5>
                                         <br>
                                            <a href="index.html" class="logo logo-admin" style="">
                                                <img src="<?= URL_ROOT; ?>/public/assets/images/logo.jpg" height="35" width="55" alt="logo">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="card-body p-4">
                                        <div class="p-3">
                                    
                                            <form class="mt-4" action="<?= URL_ROOT?>/Logins/seConnecterUser" method="post">
                                                <?php if (!empty($data)) :?>
                                                    <?= $data['result']; ?>
                                                <?php endif?>

                                                <div class="mb-3 mt-1">
                                                    <label class="form-label" for="username">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter votre email" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Mot de passe</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="password" id="password" name="password" class="form-control"  placeholder="Entrer votre mot de passe" required>
                                                        <div class="input-group-text" data-password="false">
                                                            <span class="password-eye"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <div class="col-sm-6">
                                                    </div>
                                                    <div class="col-sm-6 text-end">
                                                        <button style="background-color:#0598ff;" class="btn text-light w-md waves-effect waves-light" type="submit" name="loginUser">Se connecter</button>
                                                    </div>
                                                </div>
                                                

                                                <div class="mt-2 mb-0 row">
                                                    <div class="col-12 mt-2">   
                                                        <a href="<?= URL_ROOT; ?>/Logins/inscriptionUser"><i class="mdi mdi-lock" ></i> pas de compte ?</a>
                                                    </div>
                                         
                                                </div>

                                            </form>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
             

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

   
</div>