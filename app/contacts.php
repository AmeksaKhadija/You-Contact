<?php
include 'Connection.php';

class Contact {
    private $db;

    public function __construct() {
        $this->db = (new Connection())->connect();
    }

    public function getAllContacts() {
        $query = "SELECT * FROM contacts";
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            $contacts = [];
        }
        return $contacts;
    }

    public function addContact(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? null;
            $prenom = $_POST['prenom'] ?? null;
            $email = $_POST['email'] ?? null;
            $tele = $_POST['telephone'] ?? null;  
            
            try {
                $db = (new Connection())->connect();

                $query = "INSERT INTO contacts(nom,prenom,email,telephone) VALUES(:nom, :prenom, :email, :telephone)";
                $stmt = $db->prepare($query);

                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':email',$email);
                $stmt->bindParam('telephone', $tele);

                if (!$stmt->execute()) {
                    throw new Exception("Erreur lors de l'insertion dans la table contacts.");
                }
                header("Location:http://localhost:8080/You-Contact/app/index.php");

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public function deletContact($contactID){
        try {
            $query = "DELETE FROM contacts WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $contactID, PDO::PARAM_INT);

            if (!$stmt->execute()) {
                throw new Exception("Erreur lors de la suppression du contact.");
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    

}
?>