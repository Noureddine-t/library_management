<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ======= DBConnection ====== -->
    <?php include 'connect.php'; ?>
    <!-- ======= Styles ====== -->
    <style><?php include 'style.css'; ?></style>
    <title>Ajouter un livre</title>
</head>
<body>
<section>
    <form id="consultation-form" class="feed-form" method="POST">
        <input name="titre" placeholder="Nom" type="text" required>
        <input name="auteur" placeholder="Auteur" type="text" required>
        <input name="maison" placeholder="Maison d'édition" type="text" required>
        <input name="nbrExp" placeholder="Nombre d'exemplaires" type="number" required>
        <input name="nbrPage" placeholder="Nombre de Pages" type="number" required>
        <button type="submit" name="Ajouter">Ajouter</button>
    </form>
</section>
</body>
</html>

<?php
if (isset($_POST['Ajouter'])) {
    // Récupérer les données du formulaire
    $Titre = mysqli_real_escape_string($idcon, $_POST['titre']);
    $Auteur = mysqli_real_escape_string($idcon, $_POST['auteur']);
    $Maison = mysqli_real_escape_string($idcon, $_POST['maison']);
    $Pages = mysqli_real_escape_string($idcon, $_POST['nbrPage']);
    $Exemplaire = mysqli_real_escape_string($idcon, $_POST['nbrExp']);

    // Préparer la requête d'insertion
    $insertSQL = "INSERT INTO `livres`(`titre`, `auteurs`, `maison_d_edition`, `nombre_de_pages`, `nombre_de_copies`) 
                 VALUES ('$Titre', '$Auteur', '$Maison', '$Pages', '$Exemplaire')";

    // Exécuter la requête
    if (mysqli_query($idcon, $insertSQL)) {
        echo "<script type=\"text/javascript\"> 
                alert('Livre enregistré avec succès'); 
                window.location.href = 'gestionLivres.php';
              </script>";
    } else {
        echo "<script type=\"text/javascript\"> 
                alert('Erreur : " . mysqli_error($idcon) . "');
              </script>";
    }
}

// Fermer la connexion à la base de données
mysqli_close($idcon);
?>
