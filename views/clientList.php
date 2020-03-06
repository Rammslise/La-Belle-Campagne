<?php
session_start();

require '../init/functions.php';
require '../init/credentials.php';
require '../models/database.php';
require '../models/client.php';
require_once'../controllers/clientListCtrl.php';
include '../utilities/header.php';
?>
<?php
if (!isAdmin()) {
    header('Location: ../index.php');
    exit();
}
?>
<div class= "p-4">
    <h2 class="text-center">Liste des clients </h2>
</div>
<div class="row justify-content-center">
    <div class="col-md-9">
        <table class="table">
            <thead class="thead-dark">
                <tr>              
                    <th scope="col"><h3><span>Pseudo</span></h3></th>
                    <th scope="col"><h3><span>Mail</span></h3></th>
                    <th scope="col">
                        <form class="form-inline my-0 my-lg-0" method="POST" action="">
                            <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
                            <button class="btn btn-outline my-2 my-sm-0" type="submit" name="search"><img src="../assets/img/table/search.png" width="30" height="30"/></button>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white">
<?php foreach ($clientList as $client) { ?>
                    <tr>    
                        <td class="col-3">
                            <p class="h6"><?= $client->pseudo ?></p>
                        </td>
                        <td class="col-3">
                            <p class="h6"><?= $client->mail ?></p>
                        </td>              
                        <td class="col-3">
                            <a class="btn btn-info" href="clientProfile.php?id=<?= $client->id ?>">Profil</a>                              
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-<?= $client->id ?>">
                                Supprimer
                            </button>                   
                            <!-- Modal -->
                            <div class="modal fade" id="modal-<?= $client->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûr de vouloir supprimer le profil ?
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <a class="btn btn-primary" href="deleteClient.php?id=<?= $client->id ?>">Confirmer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-center">
    <nav aria-label="pagination">
        <ul class="pagination">
            <?php if ($currentPage > 1) { ?>
                <span><li class="page-item"><a class="page-link" href="clientList.php?page=<?= $currentPage - 1 ?><?= isset($search) ? '&search=' . $search : '' ?>">&laquo; Précédent</a></li></span>
            <?php } ?>

            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                <span><li class="page-item"><a class="page-link" href="clientList.php?page=<?= $i ?><?= isset($search) ? '&search=' . $search : '' ?>"><?= $i ?></a></li></span>
            <?php } ?>

                    <?php if ($currentPage < $totalPages) { ?>
                <span><li class="page-item"><a class="page-link" href="clientList.php?page=<?= $currentPage + 1 ?><?= isset($search) ? '&search=' . $search : '' ?>">Suivant &raquo;</a></li></span>
<?php } ?>
        </ul>
    </nav> 
</div>
</div>
<?php include '../utilities/footer.php'; ?>