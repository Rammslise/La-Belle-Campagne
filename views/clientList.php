<?php
session_start();

require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/client.php';
require_once '../controllers/clientListCtrl.php';
include '../utilities/header.php';
?>
<?php if (isAdmin()) { ?>
    <div class="row">
        <div class="col-12 mt-2">
            <h2 class="text-center" style="color: white">Liste des clients </h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Pseudo</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Password</th>
                        <th scope="col">id Rôle</th>
                        <th scope="col">Adresse Mail</th>
                        <th scope="col">
                            <form class="form-inline" method="POST" action="">
                                <input class="form-control p-1 mr-1" type="text" name="search"  aria-label="Search" />
                                <input type="submit" name="submit" value="Envoyer"/>
                            </form>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php foreach ($clientList as $client) { ?>
                        <tr>    
                            <td>
                                <?= $client->id ?>
                            </td>
                            <td>
                                <?= $client->pseudo ?>
                            </td>
                            <td>
                                <?= $client->mail ?>
                            </td>
                            <td>
                                <?= $client->password ?>                               
                            </td>
                            <td>
                                <?= $client->id_7ie1z_roles ?>
                            </td>                
                            <td class="col-4">
                                <a class="btn btn-info" href="clientProfile.php?id=<?= $client->id ?>">Profil</a>                              
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-<?= $cllient->id ?>">
                                    Supprimer
                                </button>                   
                                Modal 
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
                                                <a class="btn btn-primary" href="exo11_deletePatient.php?id=<?= $client->id ?>">Confirmer</a>
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
                    <li class="page-item"><a class="page-link" href="exo2_listPatient.php?page=<?= $currentPage - 1 ?><?= isset($search) ? '&search=' . $search : '' ?>">&laquo; Précédent</a></li>
                <?php } ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="exo2_listPatient.php?page=<?= $i ?><?= isset($search) ? '&search=' . $search : '' ?>"><?= $i ?></a></li>
                <?php } ?>

                <?php if ($currentPage < $totalPages) { ?>
                    <li class="page-item"><a class="page-link" href="exo2_listPatient.php?page=<?= $currentPage + 1 ?><?= isset($search) ? '&search=' . $search : '' ?>">Suivant &raquo;</a></li>
                    <?php } ?>
            </ul>
        </nav> 
    </div>
    </div>
    <?php include '../utilities/footer.php'; ?>
<?php
} else {
    header('Location: ../index.php');
    exit();
}
?>