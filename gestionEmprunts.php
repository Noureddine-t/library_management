<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include "connect.php" ; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>bibliothèque</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.jpg" alt="library logo">
            </div>

            <span class="logo_name">Bibliothèque ENSAA</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="index.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Principale</span>
                </a></li>
                <li><a href="gestionLivres.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Gestion des livres</span>
                </a></li>
                <li><a href="gestionUsagers.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Gestion des usagers</span>
                </a></li>
                <li><a href="gestionEmprunts.php">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Gestion des emprunts</span>
                </a></li>
                
            </ul>
            
            <ul class="logout-mode">

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Mode sombre</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>

        <div class="dash-content">

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Gestion des emprunts</span>
                </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
    
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <a href="insertEmprunt.php" class="ajout">Ajouter une Emprunte</a>
                    </div>

                    <table id="myTable">
                        <thead>
                            <tr>
                                <td>Nom d'usager</td>
                                <td style="text-align : center ;">livre emprunter</td>
                                <td>DateEmp</td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Select livres-->
                            <?php 
                                $selectSQL = "SELECT * FROM `emprunts`";
                                $resultOuter = mysql_query($selectSQL, $idcon);
                                if ($resultOuter) {
                                    while ($row = mysql_fetch_assoc($resultOuter)) {
                                        $Numero_emprunt = $row['id'];
                                        
                                        // Fetching client
                                        $Numero_usager = $row['id_personne'];
                                        $selectUsagerSQL = "SELECT nom, prenom FROM `usagers` WHERE id_personne = $Numero_usager";
                                        $resultInner = mysql_query($selectUsagerSQL, $idcon);
                                        $usager = mysql_fetch_assoc($resultInner);
                                        $Nom_usager = $usager['nom'];
                                        $Prenom_usager = $usager['prenom'];

                                        // Fetching livre
                                        $Numero_livre = $row['id_livre'];
                                        $selectLivreSQL = "SELECT titre FROM `livres` WHERE id_livre = $Numero_livre";
                                        $resultInner = mysql_query($selectLivreSQL, $idcon);
                                        $livre = mysql_fetch_assoc($resultInner);
                                        $Titre_livre = $livre['titre'];

                                        $DateEmprunt = $row['date_emprunt'];

                                        echo "<tr>";
                                        echo "<td>" . $Prenom_usager . ' ' . $Nom_usager . "</td>";
                                        echo "<td style=\"text-align: center;\">$Titre_livre</td>";
                                        echo "<td>$DateEmprunt</td>";
                                        echo "<td style=\"text-align: center;\">";
                                        echo " <button class=\"status return\"  name=\"Delete\" > <a  href=\"supprimerEmprunt.php?deleteid=$Numero_emprunt \">Supprimer</a> </button> " ;           
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            <!-- end of select-->
                        </tbody>
                    </table>
                </div>         





                
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>