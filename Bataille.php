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
            <h1 class="text-center">Bataille</h1>
            <?php

                
                $Cartes = [] ;
                $CartesJ1 = [] ;
                $CartesJ2 = [] ;
                
                
                
                
                for ($i=1; $i <= 13 ; $i++) { 

                    $Cartes[] = ['valeur' => $i, 'couleur' => 'coeur'];
                    $Cartes[] = ['valeur' => $i, 'couleur' => 'pique'];
                    $Cartes[] = ['valeur' => $i, 'couleur' => 'trefle'];
                    $Cartes[] = ['valeur' => $i, 'couleur' => 'carreau'];
                
                }
                
                // var_dump($Cartes);

                for ($i=0; $i <= 10 ; $i++) { 
                    shuffle($Cartes);
                }

                for ($i=0; $i < count($Cartes) ; $i = $i + 2) { 
                    $CartesJ1[] = $Cartes[$i];
                    $CartesJ2[] = $Cartes[$i + 1];
                }
                
                while (!empty($CartesJ1) || !empty($CartesJ2)) {
                    
                
                    
                    $carteJouerJ1 = array_shift($CartesJ1);
                    $carteJouerJ2 = array_shift($CartesJ2);

                    echo '<div class="alert alert-info text-center" role="alert"> (J1) joue le '.$carteJouerJ1['valeur'].' de '.$carteJouerJ1['couleur'].' VS le '.$carteJouerJ2['valeur'].' de '.$carteJouerJ2['couleur'].' pour le (J2). </div>';

                    if ($carteJouerJ1['valeur'] > $carteJouerJ2['valeur']){
                        echo '<div class="alert alert-info text-center" role="alert"> (J1) gagne !! </div>';
                        
                    } else if ($carteJouerJ1['valeur'] < $carteJouerJ2['valeur']) {
                        echo '<div class="alert alert-info text-center" role="alert"> (J2) gagne !! </div>';
                    } else if ($carteJouerJ1['valeur'] == $carteJouerJ2['valeur']) {
                        echo '<div class="alert alert-info text-center" role="alert"> (J1) gagne !! </div>';
                    }
                    

                }

            ?>


        </div>
    </div>
</main>
<?php
    include 'fragments/footer.php';
?>


</body>
</html>