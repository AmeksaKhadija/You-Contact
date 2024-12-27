<?php
include_once 'Contacts.php';

$contact = new Contact();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'])) {
        $id = $_POST['id'];
        $data = [
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email' => $_POST['email'],
            'telephone' => $_POST['telephone'],
        ];
        try {
            $contact->updateContact($id, $data);
            header("Location: ./index.php");
            exit();
        } catch (Exception $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }
}

if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
    $contactID = $_GET['edit_id'];
    $selectedContact = $contact->getContactById($contactID);

    if (!$selectedContact) {
        echo "Contact introuvable.";
        exit();
    }
} else {
    echo "ID de contact non fourni.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./../assets/style.css">
    <title>You-Contact</title>
</head>

<body>
    <div class="container">
        <div class="card p-4">
            <form method="POST" action="./edit.php">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($selectedContact['id']); ?>">
                <label for="nom">Nom:</label>
                <input class="form-control" type="text" name="nom" id="nom"
                    value="<?php echo htmlspecialchars($selectedContact['nom']); ?>" required>
                <br>
                <label for="prenom">Prénom:</label>
                <input class="form-control" type="text" name="prenom" id="prenom"
                    value="<?php echo htmlspecialchars($selectedContact['prenom']); ?>" required>
                <br>
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email"
                    value="<?php echo htmlspecialchars($selectedContact['email']); ?>" required>
                <br>
                <label for="telephone">Téléphone:</label>
                <input class="form-control" type="text" name="telephone" id="telephone"
                    value="<?php echo htmlspecialchars($selectedContact['telephone']); ?>" required>
                <br>
                <button type="submit">Mettre à jour</button>
            </form>
        </div>
    </div>

    <script src="./../assets/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>