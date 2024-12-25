<?php
include_once 'contacts.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit();
}

if (isset($_GET['delete_id']) && !empty($_GET['delete_id'])) {
    $contactID = $_GET['delete_id'];
    // var_dump($contactID);
    // die();
        $contact = new Contact();

    try {
        $contact->deletContact($contactID);
        header('Location: http://localhost:8080/You-Contact/app/index.php');
        exit();
    } catch (Exception $e) {
        echo "Erreur lors de la suppression : " . $e->getMessage();
    }
} else {
    echo "ID de contact non fourni.";
}
?>