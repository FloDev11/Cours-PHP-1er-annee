
<!doctype html>
<html lang="en">
<?php
    include 'fragments/head.php';
?>
<body>
<?php
    include 'fragments/header.php';
?>
<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Album example</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <h1 class="text-center">Contact</h1>
            <?php
            // Vérification de la soumission du formulaire
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupération des données
                $firstName = $_REQUEST['firstName'];
                $lastName = $_REQUEST['lastName'];
                $email = $_REQUEST['email'];
                $message = $_REQUEST['message'];
                $errors = 0;
                // Vérification des données
                if (empty($firstName)) {
                    echo '<div class="alert alert-danger" role="alert">Le prénom est requis !</div>';
                    $errors++;
                }
                if (empty($lastName)) {
                    echo '<div class="alert alert-danger" role="alert">Le nom est requis !</div>';
                    $errors++;
                }
                if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<div class="alert alert-danger" role="alert">L\'email est invalide !</div>';
                    $errors++;
                }
                if (strlen($message) < 10) {
                    echo '<div class="alert alert-danger" role="alert">Le message doit contenir au minimum 10 caractères !</div>';
                    $errors++;
                }
                // Traitement du formulaire
                if (empty($errors)) {
                    // Fonction Email
                    //mail('admin@mds.fr', 'Demande de contact', $message);
                    // Suppression des variables
                    unset($firstName);
                    unset($lastName);
                    unset($email);
                    unset($message);
                    echo '<div class="alert alert-success" role="alert">Votre message a été envoyé avec succès !</div>';
                }
            }
            ?>
            <form action="contact.php" method="post">
                <div class="form-group">
                    <label for="firstName">Prénom</label>
                    <input type="text" autocomplete="off" class="form-control" id="firstName" name="firstName" placeholder="Votre prénom" value="<?= $firstName ?? ""; ?>">
                </div>
                <div class="form-group">
                    <label for="lastName">Nom</label>
                    <input type="text" autocomplete="off" class="form-control" id="lastName" name="lastName" placeholder="Votre nom" value="<?= $lastName ?? ""; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" autocomplete="off" class="form-control" id="email" name="email" placeholder="Votre email" value="<?= $email ?? ""; ?>">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3"><?= $message ?? ""; ?></textarea>
                </div>
                <button type="submit" class="mt-5 btn btn-primary mb-2">Envoyer le message</button>
            </form>

        </div>
    </div>
</main>
<?php
    include 'fragments/footer.php';
?>
</body>
</html>
