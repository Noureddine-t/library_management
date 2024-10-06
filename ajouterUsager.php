<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <?php include 'connect.php' ;?>
  
    <style><?php include 'style.css'; ?></style>
    <title>Ajouter un usager</title>
</head>
<body>
<section class="section_form">
  <form id="consultation-form" class="feed-form" method="POST">
    <input name="nom" placeholder="Nom" type="text">
    <input name="prenom" placeholder="Prenom" type="text">
    <input name="adresse" placeholder="Adresse" type="text">
    <input name="email" placeholder="email" type="text">
    <div >
        <div>
            <label><input type="radio" name="statut" checked="" value="Etudiant">
            <span>Etudiant</span>
            </label>
            <label><input type="radio" name="statut" value="Enseignant">
            <span>Enseignant</span>
            </label>
        </div>
    </div>
    <button type="submit" name="Ajouter" >Ajouter</button>
  </form>
</section>
</body>
</html>


<?php 
if(isset($_POST['Ajouter'])) {
  $Nom = $_POST['nom'] ;
  $Prenom = $_POST['prenom'] ;
  $Adresse = $_POST['adresse'] ;
  $Statut = $_POST['statut'] ;
  $Email = $_POST['email'] ;

  $insertSQL = "INSERT INTO `usagers`( `nom`, `prenom`, `addresse`, `statut`, `email`) 
                VALUES ('$Nom','$Prenom','$Adresse','$Statut','$Email')" ;
  $result=@mysql_query($insertSQL,$idcon);

  if($result){
    echo "<script type=\"text/javascript\"> alert('usager enregistrer avec succces'); 
    window.location.href = \"http://localhost/ADMIN_DASHBOARD_PANEL/gestionUsagers.php\";
           </script>";
  }else {
    echo "<script type=\"text/javascript\"> alert('Erreur : ".mysql_error()."')</script>";
  }
}
mysql_close($idcon);
?>