<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Prepare the delete statement
    $deleteSQL = "DELETE FROM `usagers` WHERE id_personne = ?";
    
    // Initialize the statement
    $stmt = mysqli_prepare($idcon, $deleteSQL);

    if ($stmt) {
        // Bind the parameter
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script type=\"text/javascript\"> alert('Usager supprimé avec succès'); 
            window.location.href = \"gestionUsagers.php\";
            </script>";
        } else {
            echo "<script type=\"text/javascript\"> alert('Erreur : " . mysqli_error($idcon) . "')</script>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<script type=\"text/javascript\"> alert('Erreur de préparation de la requête.')</script>";
    }
}

// Close the connection
mysqli_close($idcon);
?>
