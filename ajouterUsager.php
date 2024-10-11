<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'connect.php'; ?>

    <style><?php include 'style.css'; ?></style>
    <title>Ajouter un usager</title>
</head>
<body>
<section class="section_form">
    <form id="consultation-form" class="feed-form" method="POST">
        <input name="nom" placeholder="Nom" type="text" required>
        <input name="prenom" placeholder="Prénom" type="text" required>
        <input name="adresse" placeholder="Adresse" type="text" required>
        <input name="email" placeholder="Email" type="email" required>
        <div>
            <div>
                <label><input type="radio" name="statut" value="Etudiant" checked>
                    <span>Étudiant</span>
                </label>
                <label><input type="radio" name="statut" value="Enseignant">
                    <span>Enseignant</span>
                </label>
            </div>
        </div>
        <button type="submit" name="Ajouter">Ajouter</button>
    </form>
</section>
</body>
</html>

<?php
if (isset($_POST['Ajouter'])) {
    // Sécuriser les données utilisateur
    $Nom = mysqli_real_escape_string($idcon, $_POST['nom']);
    $Prenom = mysqli_real_escape_string($idcon, $_POST['prenom']);
    $Adresse = mysqli_real_escape_string($idcon, $_POST['adresse']);
    $Statut = mysqli_real_escape_string($idcon, $_POST['statut']);
    $Email = mysqli_real_escape_string($idcon, $_POST['email']);

    // Requête d'insertion
    $insertSQL = "INSERT INTO `usagers` (`nom`, `prenom`, `addresse`, `statut`, `email`) 
                  VALUES ('$Nom', '$Prenom', '$Adresse', '$Statut', '$Email')";

    // Exécuter la requête
    if (mysqli_query($idcon, $insertSQL)) {
        echo "<script type=\"text/javascript\"> 
                alert('Usager enregistré avec succès'); 
                window.location.href = 'gestionUsagers.php';
              </script>";
    } else {
        echo "<script type=\"text/javascript\"> 
                alert('Erreur : " . mysqli_error($idcon) . "');
              </script>";
    }
}

// Fermer la connexion
mysqli_close($idcon);
?>
