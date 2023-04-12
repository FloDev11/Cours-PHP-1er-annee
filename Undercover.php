<!doctype html>
<html lang="en">
<?php
    include 'fragments/head.php';
    echo '<link rel="stylesheet" href="Styles/Undercover.css">';
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
            <h1 class="text-center">Undercover</h1>
            <?php

                
                $tabJoueur = [] ;
                $tabMots = [] ;
                $i = 0;
                $y = 0;
                

                $fileMots = fopen('files/'. 'mots.txt','r');
                
                while (!feof($fileMots)) {

                    // Lire ligne par ligne
                    $mot = trim(fgets($fileMots));

                    $tabMots[] = $mot ;
                    
                }

                fclose($fileMots);

                $fileJoueur = fopen('files/'. 'joueur.txt','r');

                echo '<div style="display: flex; justify-content: space-around">';

                // parcourir le fichier

                while (!feof($fileJoueur)) {

                    // Lire ligne par ligne
                    $joueur = trim(fgets($fileJoueur));

                    $tabJoueur[$i] = $joueur ;
                    
                    echo '<button style="border: 1px solid black; padding: 20px; border-radius: 20px; background-color: blue;
                    color: white; margin: 50px 0px"> '.$tabJoueur[$i].' </button>'; 
                                 
                    $i++;
                }

                fclose($fileJoueur);

                echo '</div>';


                

                echo '<div style="display: flex; justify-content: space-around">';

                $indiceMotJouer = rand(0,count($tabMots)-1);
                    
                $motJouer = $tabMots[$indiceMotJouer];

                $indiceJoueurMrWhite = rand(0,count($tabJoueur)-1);

                $joueurMrWhite = $tabJoueur[$indiceJoueurMrWhite];

                while ($y < count($tabJoueur)) {

                    if ($y == $indiceJoueurMrWhite){
                        echo '<div id="hidden" > Vous êtes Mr. White !</div>';
                    }
                    else {
                        echo '<div id="hidden" > Le mot est : '.$motJouer.'</div>';
                    }

                    $y++;
                }
                
                echo '</div>';
                


            ?>

            <div class="mt-2">
                <button class="mt-5 btn btn-warning mb-3" onclick="afficher()">Cacher</button>
            </div>
            <div class="mt-3">
                <a href="Undercover.php" class="mt-5 btn btn-success mb-3">Rejouer</a>
            </div>
            

        </div>
    </div>
</main>
<?php
    include 'fragments/footer.php';
?>

<script>
        function afficher(id) {
            // Cacher tous les autres éléments
            Array.from(document.getElementsByClassName('mots')).forEach(function (el, key) {
                document.getElementById('mot_' + key).style.display = 'none';
            });
            // Afficher / Cacher l'élément
            if (id !== undefined) {
                document.getElementById('mot_' + id).style.display = 'block';
            }
        }
    </script>




</body>
</html>