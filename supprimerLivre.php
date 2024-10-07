<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    // Sanitize input
    $id = intval($_GET['deleteid']); // Ensure the id is treated as an integer

    // Prepare the delete statement
    $deleteSQL = "DELETE FROM `livres` WHERE id_livre = ?";

    // Initialize the statement
    $stmt = mysqli_prepare($idcon, $deleteSQL);

    if ($stmt) {
        // Bind the parameter
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script type=\"text/javascript\"> alert('Livre supprimé avec succès'); 
            window.location.href = \"gestionLivres.php\";
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
