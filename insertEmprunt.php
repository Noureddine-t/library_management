<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'connect.php'; ?>
    <style><?php include 'style.css'; ?></style>
    <title>Ajouter une emprunte</title>
</head>
<body>
    <section class="section_form">
        <form method="POST" id="loan-form" class="feed-form">
            <label for="usager"><h3>Usager:</h3></label>
            <select name="Numero_usager" id="usager" class="box" required>
                <?php
                // Fetch usager data from the database
                $usagerQuery = "SELECT * FROM usagers";
                $usagerResult = mysqli_query($idcon, $usagerQuery);
                while ($usager = mysqli_fetch_assoc($usagerResult)) {
                    echo "<option value='" . $usager['id_personne'] . "'>" . $usager['nom'] . " " . $usager['prenom'] . "</option>";
                }
                ?>
            </select>
            <br><br>

            <label for="livre"><h3>Livres:</h3></label>
            <select name="Numero_livre" id="livre" class="box" required>
                <?php
                // Fetch livre data from the database
                $livreQuery = "SELECT * FROM livres WHERE nombre_de_copies >= 1";
                $livreResult = mysqli_query($idcon, $livreQuery);
                while ($livre = mysqli_fetch_assoc($livreResult)) {
                    echo "<option value='" . $livre['id_livre'] . "'>" . $livre['titre'] . " by " . $livre['auteurs'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <input type="button" value="Ajouter livre" onclick="addLivre()">
            <ul id="selected-livres">
            <h2>Liste des livres choisis :</h2>
            </ul> 
            <br><br>
            
            <input type="hidden" name="selected_livres" id="selected-livres-input" value="">
            <button type="button" class="button_submit" onclick="submitForm()">Ajouter une emprunte</button>
        </form>
    </section>

<script type="text/javascript">
    const selectedLivres = [];
    function addLivre() {
        const livreSelect = document.getElementById("livre");
        const selectedLivreId = livreSelect.value;
        const selectedLivreText = livreSelect.options[livreSelect.selectedIndex].text;
        if (!selectedLivres.includes(selectedLivreId)) {
            selectedLivres.push(selectedLivreId);
            const selectedLivresList = document.getElementById("selected-livres");
            const selectedLivreItem = document.createElement("li");
            selectedLivreItem.textContent = selectedLivreText;
            selectedLivresList.appendChild(selectedLivreItem);
        } else {
            alert("Livre déjà sélectionné.");
        }
    }

    function submitForm() {
        if (selectedLivres.length > 0) {
            const selectedLivresInput = document.getElementById("selected-livres-input");
            selectedLivresInput.value = JSON.stringify(selectedLivres); // Convert the array to a JSON string

            // Execute the form submission
            document.getElementById("loan-form").submit();
        } else {
            alert("Pas de livre sélectionné.");
        }
    }
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usager_id = mysqli_real_escape_string($idcon, $_POST['Numero_usager']);
    $selectedLivres = [];

    // Check if livres are selected
    if (isset($_POST['selected_livres']) && !empty($_POST['selected_livres'])) {
        $selectedLivres = json_decode($_POST['selected_livres'], true); // Decode the JSON string to an array

        if (count($selectedLivres) > 0) {
            // Insert the loans for the selected livres
            foreach ($selectedLivres as $livre_id) {
                // Get the current date
                $date_emprunt = date('Y-m-d H:i:s');

                // Insert the loan information into the "emprunts" table
                $sql = "INSERT INTO emprunts (id_personne, id_livre, date_emprunt) VALUES ('$usager_id', '$livre_id', '$date_emprunt')";
                if (mysqli_query($idcon, $sql)) {
                    // Update the "Exemplaires" field to decrement by 1 for the selected livre
                    $updateSql = "UPDATE livres SET nombre_de_copies = nombre_de_copies - 1 WHERE id_livre = '$livre_id'";
                    mysqli_query($idcon, $updateSql);
                } else {
                    echo "Error creating loan: " . mysqli_error($idcon);
                }
            }
            echo "<script type=\"text/javascript\"> 
                    alert('Emprunt créé avec succès'); 
                    window.location.href = 'gestionEmprunts.php';
                  </script>";
        } else {
            echo "<script type=\"text/javascript\"> 
                    alert('Pas de livre sélectionné'); 
                  </script>";
        }
    } else {
        echo "<script type=\"text/javascript\"> 
                alert('Pas de livre sélectionné'); 
              </script>";
    }
}

// Fermer la connexion
mysqli_close($idcon);
?>
</body>
</html>
