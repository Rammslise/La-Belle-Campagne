<?php

$client = new Client();

if (isset($_SESSION['message'])) {
    $message = htmlspecialchars($_SESSION['message']);
    unset($_SESSION['message']);
}

// Nbres d'articles par page
$perPage = 4;

/**
 * Comptabilisation
 */
if (isset($_POST['search']) || isset($_GET['search'])) {
    //récupération du mot clé
    $search = isset($_POST['search']) ? htmlspecialchars($_POST['search']) : htmlspecialchars($_GET['search']);

    $totalClients = $client->pagingClientSearchList($search);
} else {
    $totalClients = $client->pagingClientList();
}
//ceil — Arrondit au nombre supérieur
$totalPages = ceil($totalClients / $perPage);

/*
 * Condition pour que la valeur numérique des pages soit la bonne dans l'url, et non un nombre plus haut ou négatif.
 */
if (isset($_GET['page']) && is_numeric($_GET['page'])) {

    $currentPage = htmlspecialchars($_GET['page']);
} else {
    $currentPage = 1;
}
if ($currentPage < 1) {
    $currentPage = 1;
} elseif ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}
$offset = ($currentPage - 1) * $perPage;

/*
 * Récupération de la liste des patients
 * 
 */
if (isset($_POST['search']) || isset($_GET['search'])) {
    //récupération d'un ou plusieurs patients dans la liste
    $clientList = $client->searchClient($perPage, $offset, $search);
} else {
    $clientList = $client->getClientList($perPage, $offset);
}
?>