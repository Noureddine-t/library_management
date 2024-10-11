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
    <title>Modifier un livre</title>
</head>
<body>
<?php
// Vérification de l'identifiant dans l'URL
if (isset($_GET['updateid'])) {
    $id = intval($_GET['updateid']);
    $selectSQL = "SELECT * FROM `livres` WHERE id_livre = $id";
    $result = mysqli_query($idcon, $selectSQL);

    // Récupération des informations existantes
    if ($row = mysqli_fetch_assoc($result)) {
        $Titre_Orig = htmlspecialchars($row['titre']);
        $Auteur_Orig = htmlspecialchars($row['auteurs']);
        $Maison_Orig = htmlspecialchars($row['maison_d_edition']);
        $Pages_Orig = htmlspecialchars($row['nombre_de_pages']);
        $Exemplaire_Orig = htmlspecialchars($row['nombre_de_copies']);
    } else {
        echo "<script>alert('Livre non trouvé'); window.location.href = 'gestionLivres.php';</script>";
        exit();
    }

    // Traitement du formulaire de modification
    if (isset($_POST['Modifier'])) {
        $Titre = htmlspecialchars(trim($_POST['titre']));
        $Auteur = htmlspecialchars(trim($_POST['auteur']));
        $Maison = htmlspecialchars(trim($_POST['maison']));
        $Pages = intval($_POST['nbrPage']);
        $Exemplaire = intval($_POST['nbrExp']);

        // Mise à jour des informations du livre
        $updatetSQL = "UPDATE `livres` SET `titre`='$Titre', `auteurs`='$Auteur', `maison_d_edition`='$Maison', `nombre_de_pages`=$Pages, `nombre_de_copies`=$Exemplaire WHERE id_livre = $id";
        $result = mysqli_query($idcon, $updatetSQL);

        if ($result) {
            echo "<script>alert('Livre modifié avec succès'); 
                              window.location.href = 'gestionLivres.php';
                              </script>";
        } else {
            echo "<script>alert('Erreur : " . mysqli_error($idcon) . "')</script>";
        }
    }
} else {
    echo "<script>alert('Aucun identifiant fourni'); window.location.href = 'gestionLivres.php';</script>";
    exit();
}

// Fermer la connexion
mysqli_close($idcon);
?>

<section>
    <form id="consultation-form" class="feed-form" method="POST">
        <label for="titre">Titre</label>
        <input name="titre" type="text" value="<?php echo $Titre_Orig; ?>" required>

        <label for="auteur">Auteur</label>
        <input name="auteur" type="text" value="<?php echo $Auteur_Orig; ?>" required>

        <label for="maison">Maison d'édition</label>
        <input name="maison" type="text" value="<?php echo $Maison_Orig; ?>" required>

        <label for="nbrExp">Nombre d'exemplaires</label>
        <input name="nbrExp" type="number" min="0" value="<?php echo $Exemplaire_Orig; ?>" required>

        <label for="nbrPage">Nombre de pages</label>
        <input name="nbrPage" type="number" min="1" value="<?php echo $Pages_Orig; ?>" required>

        <button class="button_submit" type="submit" name="Modifier">Modifier</button>
    </form>
</section>
</body>
</html>
