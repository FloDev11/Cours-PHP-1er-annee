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
            <h1 class="text-center">Jeux du plus ou moins</h1>


            <?php

            if (!file_exists('files/'. 'random.txt')) {
                $file = fopen('files/'. 'random.txt','w');

                fwrite($file, rand(1, 100)) ;
    
                fclose($file);
            }

            $file = fopen('files/'. 'random.txt','r');

            $NombreATrouver = fread($file, 10);

            fclose($file);

            echo $NombreATrouver;

            

            if (file_exists('files/'. 'Tentatives.txt')) {
                $fileTentative = fopen('files/'. 'Tentatives.txt','r');

                $compteurTentatives = fread($fileTentative, 10);
    
                fclose($fileTentative);
            } else {
                $compteurTentatives = 0 ;
            }

            

            


            // Vérification de la soumission du formulaire
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupération des données
                
                $NombreChoisi = $_REQUEST['NombreChoisi'];
            
                $errors = 0;
                // Vérification des données
                if (empty($NombreChoisi)) {
                    echo '<div class="alert alert-danger" role="alert">Vous devez saisir un nombre !</div>';
                    $errors++;
                    
                }

                if (!is_numeric($NombreChoisi)) {
                    echo '<div class="alert alert-danger" role="alert">Vous devez saisir un nombre !</div>';
                    $errors++;
                }
        
                // Traitement du formulaire
                if (empty($errors) ) {

                    $fileTentative = fopen('files/'. 'Tentatives.txt','w');
            
                    fwrite($fileTentative, ++$compteurTentatives) ;
                
                    fclose($fileTentative);

                    if($NombreChoisi < $NombreATrouver){
                        echo '<div class="alert alert-danger" role="alert">C\'est plus !</div>';

                    }

                    if($NombreChoisi > $NombreATrouver){
                        echo '<div class="alert alert-danger" role="alert">C\'est moins !</div>';
                        
                    }

                    if($NombreChoisi == $NombreATrouver){

                        echo '<div class="alert alert-success" role="alert">Bravo vous avez trouvé en '.$compteurTentatives.' tentatives. </div>' ;
                        

                        unlink('files/random.txt');
                        unlink('files/Tentatives.txt');
                    }
                    
                    unset($NombreChoisi);

                
                }

            }

            echo '<br><div class="alert alert-info" role="alert"> Nombres de tentatives : '.$compteurTentatives.' </div>';


            ?>
            <form action="Jeux-plus-ou-moins.php" method="post">
                <div class="form-group">
                    <label for="NombreChoisi">Saisir un nombre</label>
                    <input type="text" autocomplete="off" class="form-control" id="NombreChoisi" name="NombreChoisi" placeholder="Nombre choisi" value="<?= $NombreChoisi ?? ""; ?>">
                </div>
                
                <button type="submit" class="mt-5 btn btn-primary mb-2">Valider le choix</button>
            </form>

        </div>
    </div>
</main>
<?php
    include 'fragments/footer.php';
?>
</body>
</html>
