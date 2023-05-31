<?php
include 'connect.php' ;
if(isset($_GET['deleteid'])) {
    $Numero_emprunt = $_GET['deleteid'] ;
    $deleteSQL = "DELETE FROM `emprunts` WHERE id=$Numero_emprunt " ;
    $result=@mysql_query($deleteSQL,$idcon);

    if($result){
      echo "<script type=\"text/javascript\"> alert('Livre suppprimer avec succces'); 
      window.location.href = \"gestionEmprunts.php\";
             </script>";
    }else {
      echo "<script type=\"text/javascript\"> alert('Erreur : ".mysql_error()."')</script>";
    }

}
?>