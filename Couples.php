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
            <h1 class="text-center">Générateur de couples</h1>
            <?php

                
                $tabPrenom = [] ;
                $i = 0;


                $fileCouple = fopen('files/'. 'couple.txt','r');

                // parcourir le fichier

                while (!feof($fileCouple)) {

                    // Lire ligne par ligne
                    $prenom = trim(fgets($fileCouple));

                    $tabPrenom[$i] = $prenom ;
                    
                    // echo $tabPrenom[$i].'<br>';

                    $i++;
                }

                fclose($fileCouple);

                // while (!empty($tabPrenom)) {
                while (count($tabPrenom) >=2 ) {
                    $indicePrenom1 = rand(0,count($tabPrenom)-1);
                    
                    $tabCouple = [];
                    $tabCouple[] = $tabPrenom[$indicePrenom1];

                    // suppression de la case d'un tableau

                    unset($tabPrenom[$indicePrenom1]);

                    // Indéxation du tableau

                    $tabPrenom = array_values($tabPrenom);

            
                    $indicePrenom2 = rand(0,count($tabPrenom)-1);

                    $tabCouple[] = $tabPrenom[$indicePrenom2];

                    unset($tabPrenom[$indicePrenom2]);

                    $tabPrenom = array_values($tabPrenom);

                    // var_dump($tabCouple);

                    // echo '<div style="display: flex; justify-content: space-around">
                    //             <div style="border: 1px solid black; padding: 20px 40px"> '.$tabCouple[0].' </div> 
                    //             <div> '.$tabCouple[1].' </div>
                    //         </div>';

                    echo '<div class="alert alert-success" role="alert" style="text-align:center">'.$tabCouple[0].'-'.$tabCouple[1].'</div>';
                    
                }
                
                
                


            ?>
            <form action="Couples.php" method="post">
                
                <button type="submit" class="mt-5 btn btn-primary mb-2 align-center">S'inscrire</button>
            </form>

        </div>
    </div>
</main>
<?php
    include 'fragments/footer.php';
?>
</body>
</html>