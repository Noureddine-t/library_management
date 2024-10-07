<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'connect.php'; ?>
    <style><?php include 'style.css'; ?></style>
    <title>Modifier un usager</title>
</head>
<body>

<?php 
    // Vérification de l'existence de l'identifiant dans l'URL
    if (isset($_GET['updateid'])) {
        $id = intval($_GET['updateid']);
        $selectSQL = "SELECT * FROM `usagers` WHERE id_personne = $id";
        $result = mysqli_query($idcon, $selectSQL);
        $row = mysqli_fetch_assoc($result);
        
        // Récupération des informations existantes
        if ($row) {
            $Nom_Orig = htmlspecialchars($row['nom']);
            $Prenom_Orig = htmlspecialchars($row['prenom']);
            $Adresse_Orig = htmlspecialchars($row['addresse']);
            $Statut_Orig = htmlspecialchars($row['statut']);
            $Email_Orig = htmlspecialchars($row['email']);
        } else {
            echo "<script>alert('Usager non trouvé'); window.location.href = 'gestionUsagers.php';</script>";
            exit();
        }
        
        // Traitement du formulaire de modification
        if (isset($_POST['Modifier'])) {
            $Nom = htmlspecialchars(trim($_POST['nom']));
            $Prenom = htmlspecialchars(trim($_POST['prenom']));
            $Adresse = htmlspecialchars(trim($_POST['adresse']));
            $Statut = htmlspecialchars(trim($_POST['statut']));
            $Email = htmlspecialchars(trim($_POST['email']));
            
            // Mise à jour des informations de l'usager
            $updatetSQL = "UPDATE `usagers` SET `nom`='$Nom', `prenom`='$Prenom', `addresse`='$Adresse', `statut`='$Statut', `email`='$Email' WHERE id_personne = $id";
            $result = mysqli_query($idcon, $updatetSQL);

            if ($result) {
                echo "<script>alert('Usager modifié avec succès'); 
                      window.location.href = 'gestionUsagers.php';
                      </script>";
            } else {
                echo "<script>alert('Erreur : " . mysqli_error($idcon) . "')</script>";
            }
        }
    } else {
        echo "<script>alert('Aucun identifiant fourni'); window.location.href = 'gestionUsagers.php';</script>";
        exit();
    }
?>

<section class="section_form">
    <form id="consultation-form" class="feed-form" method="POST">
        <label for="nom">Nom</label>
        <input name="nom" type="text" value="<?php echo $Nom_Orig; ?>" required>
        
        <label for="prenom">Prenom</label>
        <input name="prenom" type="text" value="<?php echo $Prenom_Orig; ?>" required>
        
        <label for="adresse">Adresse</label>
        <input name="adresse" type="text" value="<?php echo $Adresse_Orig; ?>" required>
        
        <label for="email">Email</label>
        <input name="email" type="email" value="<?php echo $Email_Orig; ?>" required>
        
        <div class="mydict">
            <div>
                <label><input type="radio" name="statut" value="Etudiant" <?php echo ($Statut_Orig == 'Etudiant') ? 'checked' : ''; ?>>
                <span>Etudiant</span>
                </label>
                <label><input type="radio" name="statut" value="Enseignant" <?php echo ($Statut_Orig == 'Enseignant') ? 'checked' : ''; ?>>
                <span>Enseignant</span>
                </label>
            </div>
        </div>
        
        <button class="button_submit" type="submit" name="Modifier">Modifier</button>
    </form>
</section>

</body>
</html>
