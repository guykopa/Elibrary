<div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card overflow-hidden">
                            <div class="bg-primary">
                                <div class="text-primary text-center p-4">
                                    <h5 class="text-white font-size-20 p-2">S'inscrire</h5>
                                    <a href="index.html" class="logo logo-admin">
                                        <img src="<?= URL_ROOT; ?>/public/assets/images/imageHome1.jpg" height="24" alt="logo">
                                    </a>
                                </div>
                            </div>
    
                            <div class="card-body p-4">
                                
                                <div class="p-3">
                                    <?php if (isset($data["result"])) :?>
                                        <div class="alert alert-success mt-3 text-center" role="alert">
                                            <?= $data["result"] ?>
                                        </div>
                                    <?php endif ?>
                                    

                                    <form class=" mt-4" action="<?= URL_ROOT?>/Logins/enregistrerUSer" method="post">

                                        <div class="row">    
                                            <div class="col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="" name="">Nom</label>
                                                    <input type="text" class="form-control" id="" name="nom" placeholder="Nom">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="" name="">Prenom</label>
                                                    <input type="text" class="form-control" id="" name="prenom" placeholder="Prenom">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="" name="">Classe</label>
                                                    <select class="form-control single-select" data-toggle="select2" data-width="100%" name="id_classe" id="" required>
                                                        <option value="">Choisir </option>
                                                        <?php
                                                            $loginModel = $data['loginModel'];// on recupere le modèle
                                                            $classes = $loginModel->getAllClasses(); // les classes
                                                        ?>
                                                        <?php foreach($classes as $classe): ?>
                                                            <option value="<?= $classe->ID_CLASSE?>"><?= $classe->NOM?> </option>
                                                        <?php endforeach?>
                                                    </select>
                                                
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="" name="">Sexe</label>
                                                    <select class="form-control single-select" data-toggle="select2" data-width="100%" name="sexe" id="" required>
                                                        <option value="">Choisir </option>
                                                        <option value="masculin">Masculin </option>
                                                        <option value="feminin">Feminin </option>
                                                    </select>             
                                                </div>
            
                                            </div>
                                            <div class="col-xl-6">             
                                                <div class="mb-3">
                                                    <label class="form-label" for="" name="">Age</label>
                                                    <input type="number" class="form-control" id="" name="age" placeholder="Age">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="" name="">Téléphone</label>
                                                    <input type="number" class="form-control" id="" name="telephone" placeholder="6********">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="" name="">Email</label>
                                                    <input type="email" class="form-control" id="" name="email" placeholder="Email">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="" name="">Mot de passe</label>
                                                    <input type="password" class="form-control" id="" name="password" placeholder="Mot de passe">
                                                </div>
                                                    
                                            </div>
                
                                            <div class="text-center">
                                                <button type="submit" name="" class="btn btn-success waves-effect waves-light">Enregistrer</button>
                                                <button type="reset" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Annuler</button>
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