<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    // Sanitize input
    $Numero_emprunt = intval($_GET['deleteid']);

    // Prepare the delete statement
    $deleteSQL = "DELETE FROM `emprunts` WHERE id = ?";

    // Initialize the statement
    $stmt = mysqli_prepare($idcon, $deleteSQL);

    if ($stmt) {
        // Bind the parameter
        mysqli_stmt_bind_param($stmt, "i", $Numero_emprunt);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script type=\"text/javascript\"> alert('Emprunt supprimé avec succès'); 
            window.location.href = \"gestionEmprunts.php\";
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
