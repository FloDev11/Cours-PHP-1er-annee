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
            <h1 class="text-center">Liste de courses</h1>
            <?php


            // Vérification de la soumission du formulaire
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupération des données
                $produit = $_REQUEST['produitCourse'];

                $tabProduits = [];

                
                // Vérification des données
                if (empty($produit)) {

                    echo '<div class="alert alert-danger" role="alert">L\'article est requis !</div>';
                }

                //  else if (!in_array($article , $articles)) {

                //     echo '<div class="alert alert-danger" role="alert">L\'article est invalide !</div>';

                // } 
                
                else {


                    $fileProduit = fopen('files/'. 'listecourse.txt','a+');
            
                    fwrite($fileProduit, $produit . PHP_EOL ) ;
                
                    fclose($fileProduit);

             

                    unset($produit);
                    
                    echo '<div class="alert alert-success" role="alert">Le Produit choisi a été ajouter à la liste avec succès !</div>';


                    // unlink('files/listecourse.txt');


                }

                 
            }
            ?>
            <form action="ListeCourses.php" method="post">
                <div class="form-group">
                    <label for="produit">Produit à choisir</label>
                    <select name="produitCourse" id="produit" class="form-select">
                        <option value="">Produit Choisi</option>
                        <option value="Fromage">Fromage</option>
                        <option value="Creme Fraiche">Pot de crème fraîche</option>
                        <option value="Oeuf">Boîte d'oeuf x6</option>
                        <option value="Beurre">Beurre</option>
                        <option value="Farine">Farine</option>
                        <option value="Viande">Viande</option>
                        <option value="Yaourt">Yaourt</option>
                        <option value="Salade">Salade</option>
                        <option value="Pates">Pâtes</option>
                        <option value="Mouchoirs">Mouchoirs</option>
                    </select>

                    <!-- <select name="" id="" class="form-select">
                        <option value="">Choisir un produit</option>
                        <?php
                            // foreach ($articles as $article) {
                                
                            //     echo '<option value="'.$article.'">'.$article.'</option>';
                            // }

                        ?>
                    </select> -->

                </div>
                <button type="submit" class="mt-5 btn btn-primary mb-2">Envoyer produit choisi</button>
            </form>
            
            <div style="text-align:center">Liste de course</div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Articles</th>
                        <th scope="col">Quantité</th>
                    </tr>
                </thead>
                <tbody>

                

            <?php

                // Traitement du formulaire


                $fileProduit = fopen('files/'. 'listecourse.txt','r');

                // parcourir le fichier

                while (!feof($fileProduit)) {

                    // Lire ligne par ligne
                    $line = trim(fgets($fileProduit));

                    if (!empty($line)) {
                        $tabProduits[] = $line ;
                    }
                    
                    
                        
                }

                fclose($fileProduit);
                
                // Suppression des doublons dans un tableau
                $produitUnique = array_unique($tabProduits);

                // Trier par ordre alphabétique
                sort($produitUnique);

                // Tableau des occurrences
                $occurrences = array_count_values($tabProduits);


                foreach ($produitUnique as $article) {
                    

                    echo '  <tr> 
                                <td>'.$article.'</td> 
                                <td>'.$occurrences[$article].'</td> 
                            </tr>';


                }



            ?>

                </tbody>
            </table>

        </div>
    </div>
</main>
<?php
    include 'fragments/footer.php';
?>
</body>
</html>