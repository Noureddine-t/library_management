<?php
include 'connect.php' ;
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'] ;
    $deleteSQL = "DELETE FROM `usagers` WHERE id_personne=$id " ;
    $result=@mysql_query($deleteSQL,$idcon);

    if($result){
      echo "<script type=\"text/javascript\"> alert('usager suppprimer avec succces'); 
      window.location.href = \"http://localhost/ADMIN_DASHBOARD_PANEL/gestionUsagers.php\";
             </script>";
    }else {
      echo "<script type=\"text/javascript\"> alert('Erreur : ".mysql_error()."')</script>";
    }

}
?>