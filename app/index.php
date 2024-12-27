<?php
include 'Contacts.php';
// include 'Connection.php';

$contact = new Contact();
$contacts = $contact->getAllContacts();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact->addContact();
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
    <div class="nav">
        <button class="addContact" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add
            Contact</button>
        <div class="search">
            <form class="form-wrapper-2 cf">
                <input type="text" id="inputsearch" placeholder="Search..." required>
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
    <?php if (!empty($contacts)): ?>
    <table class="contact-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>EMAIL</th>
                <th>TELEPHONE</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?php echo $contact['id']; ?></td>
                <td><?php echo $contact['nom']; ?></td>
                <td><?php echo $contact['prenom']; ?></td>
                <td><?php echo $contact['email']; ?></td>
                <td><?php echo $contact['telephone']; ?></td>
                <td>
                    <form action="edit.php" method="GET" style="display:inline;">
                        <input type="hidden" name="edit_id" value="<?php echo $contact['id']; ?>">
                        <button type="submit" style="border: none; background: none; cursor: pointer;">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </form>
                </td>
                <td>
                    <form action="delete.php" method="get" style="display:inline;">
                        <input type="hidden" name="delete_id" value="">
                        <form action="delete.php" method="get" style="display:inline;">
                            <input type="hidden" name="delete_id" value="<?php echo $contact['id']; ?>">
                            <button type="submit" style="border: none; background: none; cursor: pointer;">
                                <i class="fa-solid fa-delete-left"></i>
                            </button>
                        </form>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <?php else: ?>
    <p>Aucun contact trouvé.</p>
    <?php endif; ?>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter contact</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method='POST' action="./index.php" onsubmit="return validateForm()">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" id="nom"
                                aria-describedby="nomUtilisateur">
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prenom</label>
                            <input type="text" class="form-control" name="prenom" id="prenom"
                                aria-describedby="prenomUtilisateur">
                        </div>
                        <div class="mb-3">
                            <label for="email" class=" form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                aria-describedby=" emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">TELEPHONE</label>
                            <input type="text" class="form-control" name="telephone" id="telephone">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class=" btn btn-dark">Save changes</button>
                        </div>
                        <div id="message" style="color: red;"></div>
                    </form>
                </div>
            </div>
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