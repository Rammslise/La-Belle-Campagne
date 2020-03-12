<?php
session_start();

require 'init/credentials.php';
require 'init/functions.php';
require_once 'controllers/indexCtrl.php';
include 'utilities/header.php';
?>

<body>
    <?php if (isset($message)) { ?>
        <div class="alert alert-success" role="alert">
            <?= $message ?>
        </div>
    <?php } ?>
    <div class="container-fluid">
        <!--Message -->       
        <h3 class="p-2 mt-2 mb-2 text-center "><span>Dans l'actualité</span></h3>
        <div class="home">
            <div  class="row" id="actuality">
                <div class="col-md-4">
                    <img class="img-fluid" src="assets/img/body/calendar.jpg" id="calendar" alt="marchCalendar"/>
                </div>
                <!-- Carousel-->
                <div id="homeCarousel" class="carousel slide col-md-4" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/img/body/market.jpg" class="d-block w-100 img-fluid" alt="market" />
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/body/soissonsBeans.jpg" class="d-block w-100 img-fluid" alt="beans" />
                            <div class="carousel-caption d-none d-md-block">
                                <h4><span>Ils reviennent</span></h4>
                                <p>Les fameux haricots de Soissons sont de nouveaux parmis nous</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/body/pub.jpg" class="d-block w-100 img-fluid" alt="publicity" />
                        </div>
                    </div>
                </div>    
                <div class="container">
                    <div class="content col-md-4">
                        <a href="https://www.salon-agriculture.com" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="img-fluid" src="assets/img/body/cow.jpeg" id="cowPhoto" alt="cowPhoto" />
                            <div class="content-details fadeIn-bottom">
                                <h3 class="content-title">Salon de l'agriculture</h3>
                                <p class="content-text">Du 22 février au 1 mars 2020</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mise en avant des produits-->
        <h3 class="p-2 mt-4 text-center"><span>La sélection du jour</span></h3>
        <div class="col-md-12">
            <div class="card-deck" >
                <div class="card">
                    <img src="upload/articles/potatoe.jpeg" class="card-img-top" alt="potatoe">
                    <div class="card-body">
                        <h5 class="card-title">Pomme de terre Charlotte</h5>
                        <p class="card-text">1,50€, 500g<?php if (isAdmin() || isClient() || isProducer()) { ?><button type="button" class="btn btn-success btn-sm ml-4">+</button></p> <?php } ?>
                        <p class="card-text"><small class="text-muted">Vieilliard Christian</small><img src="upload/logoProducteur/vieillardChristian.jpeg" class="ml-4 rounded-circle" name="vieillardChristianLogo" height="36" width="36"/></p>
                    </div>
                </div>
                <div class="card">
                    <img src="upload/articles/chevre.jpeg" class="card-img-top" alt="goatCheese">
                    <div class="card-body">
                        <h5 class="card-title">Fromage de chèvre frais nature</h5>
                        <p class="card-text">3,50€, 150g<?php if (isAdmin() || isClient()) { ?><button type="button" class="btn btn-success btn-sm ml-4" >+</button></p> <?php } ?>
                        <p class="card-text"><small class="text-muted">Aux Petits délices de chèvres</small><img src="upload/logoProducteur/délicesChèvres.png" class="ml-4 rounded-circle" name="délicesChèvresLogo" height="36" width="36"/></p>
                    </div>
                </div>
                <div class="card">
                    <img src="upload/articles/jambon.jpeg" class="card-img-top" alt="ham">
                    <div class="card-body">
                        <h5 class="card-title">Jambon blanc frais</h5>
                        <p class="card-text">6,87€, 250g<?php if (isAdmin() || isClient()) { ?><button type="button" class="btn btn-success btn-sm ml-4">+</button></p> <?php } ?>
                        <p class="card-text"><small class="text-muted">Saveurs des prairies</small><img src="upload/logoProducteur/saveursPraries.jpeg" class="ml-4 rounded-circle" name="saveursPrairiesLogo" height="36" width="36"/></p>
                    </div>
                </div>
                <div class="card">
                    <img src="upload/articles/poire.jpeg" class="card-img-top" alt="pear">
                    <div class="card-body">
                        <h5 class="card-title">Poire conférence</h5>
                        <p class="card-text">3,80€, 2kg<?php if (isAdmin() || isClient()) { ?><button type="button" class="btn btn-success btn-sm ml-4">+</button></p> <?php } ?>
                        <p class="card-text"><small class="text-muted">Les vergers du petit marais</small><img src="upload/logoProducteur/vergersPetitMarais.jpeg" class="ml-4 rounded-circle" name="vergersPetitMaraisLogo" height="36" width="36"/></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- La partie FOOTER  -->
    <?php include 'utilities/footer.php'; ?>
</body>
</html>
