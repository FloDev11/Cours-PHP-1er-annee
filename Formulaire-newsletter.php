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
    <!-- <section class="py-5 text-center container">
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
    </section> -->
    <div class="album py-5 bg-light">
        <div class="container">
            <h1 class="text-center">Newsletter</h1>
            <?php


            // Vérification de la soumission du formulaire
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupération des données
                $email = $_REQUEST['email'];
                $errors = 0;
                // Vérification des données
              
                if (empty($email) ) {
                    echo '<div class="alert alert-danger" role="alert">L\'email est requis !</div>';
                    $errors++;
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<div class="alert alert-danger" role="alert">L\'email est invalide !</div>';
                    $errors++;
                }




                $fileEmail = fopen('files/'. 'email.txt','r');

                // parcourir le fichier

                while (!feof($fileEmail)) {

                    // Lire ligne par ligne
                    $line = trim(fgets($fileEmail));

                    if ($email === $line) {
                        echo '<div class="alert alert-danger" role="alert">L\'email a déjà été saisi !</div>';
                        $errors++;


                        break;
                    }
                    
                }

                fclose($fileEmail);






                
                // Traitement du formulaire
                if (empty($errors)) {
                    // Fonction Email
                    //mail('admin@mds.fr', 'Demande de contact', $message);
                    // Suppression des variables
                   
                    $fileEmail = fopen('files/'. 'email.txt','a+');
            
                    fwrite($fileEmail, $email . PHP_EOL ) ;
                
                    fclose($fileEmail);




                    unset($email);
                    
                    echo '<div class="alert alert-success" role="alert">Votre email a été enregister avec succès !</div>';

                    
                }

                // unlink('files/email.txt')
            }
            ?>
            <form action="Formulaire-newsletter.php" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" autocomplete="off" class="form-control" id="email" name="email" placeholder="Votre email" >
                </div>
                <button type="submit" class="mt-5 btn btn-primary mb-2">S'inscrire</button>
            </form>

        </div>
    </div>
</main>
<?php
    include 'fragments/footer.php';
?>
</body>
</html>