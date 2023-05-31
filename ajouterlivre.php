<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ======= DBConnection ====== -->
    <?php include 'connect.php' ; ?>
    <!-- ======= Styles ====== -->
    <style><?php include 'style.css'; ?></style>
    <title>Ajouter un livre</title>
</head>
<body>
    <section >
      <form id="consultation-form" class="feed-form" method="POST">
        <input name="titre" placeholder="Nom" type="text">
        <input name="auteur" placeholder="Auteur" type="text">
        <input name="maison" placeholder="Maison d'edition" type="text">
        <input name="nbrExp" placeholder="Nombre d'exemplaires" type="text">
        <input name="nbrPage" placeholder="Nombre de Pages" type="text">
        <button type="submit" name="Ajouter" >Ajouter</button>
      </form>
    </section>
</body>
</html>

<?php 
if(isset($_POST['Ajouter'])) {
  $Titre = $_POST['titre'] ;
  $Auteur = $_POST['auteur'] ;
  $Maison = $_POST['maison'] ;
  $Pages = $_POST['nbrPage'] ;
  $Exemplaire = $_POST['nbrExp'] ;

  $insertSQL = "INSERT INTO `livres`(`titre`, `auteurs`, `maison_d_edition`, `nombre_de_pages`, `nombre_de_copies`) 
               VALUES ('$Titre' , '$Auteur' , '$Maison' , '$Pages' , '$Exemplaire' )" ;

  $result=@mysql_query($insertSQL,$idcon);

  if($result){
    echo "<script type=\"text/javascript\"> alert('Livre enregistrer '); 
    window.location.href = \"http://localhost/ADMIN_DASHBOARD_PANEL/gestionLivres.php\";
           </script>";
  }else {
    echo "<script type=\"text/javascript\"> alert('Erreur : ".mysql_error()."')</script>";
  }

}
mysql_close($idcon);
?>