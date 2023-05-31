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
                    <span class="link-name">Pricinpale</span>
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

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" name="search_filter" class="input"  id="filterInput" placeholder="chercher personne ...">
            </div>
            
        </div>

        <div class="dash-content">

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Liste des usagers</span>
                </div>

                <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <div class='ajout'>
                        <a href="ajouterUsager.php" class="btn">Ajouter un usager</a>
                        </div>
                        
                    </div>
                    <table id="myTable">
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Prenom</td>
                                <td>Adresse</td>
                                <td>Statut</td>
                                <td>Email</td>
                                <td style="text-align:center;">DB</td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Select livres-->
                                <?php 
                                $selectSQL = "SELECT * FROM  `usagers`";
                                $result=@mysql_query($selectSQL,$idcon);
                                    if($result){
                                        while($row = mysql_fetch_assoc($result) ) {
                                            $id = $row['id_personne'] ;
                                            $Nom = $row['nom'] ;
                                            $Prenom = $row['prenom'] ;
                                            $Adresse = $row['addresse'] ;
                                            $Statut = $row['statut'] ;
                                            $Email = $row['email'] ;
                                            echo "<tr>";
                                            echo "<td>$Nom</td>";
                                            echo "<td>$Prenom</td>";
                                            echo "<td>$Adresse</td>";
                                            echo "<td >$Statut</td>";
                                            echo "<td >$Email</td>";
                                            echo "<td style=\"text-align : center ;\">";
                                            echo " <button class=\"status delivered\"  name=\"Update\" > <a  href=\"modifierClient.php?updateid=$id \"> Modifier</a> </button> " ;   
                                            echo " <button class=\"status return\"     name=\"Delete\" > <a  href=\"supprimerClient.php?deleteid=$id \"> Supprimer</a> </button> " ;             
                                            echo "</td>" ;     
                                            echo " </tr>" ;
                                        }
                                    }
                                mysql_close($idcon);
                                ?>
                            <!-- end of select-->
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>

    <script>
        // Search Input :
        document.getElementById("filterInput").addEventListener("input", function() {
        var filter = this.value.toUpperCase();
        var table = document.getElementById("myTable");
        var rows = table.getElementsByTagName("tr");
        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            var isVisible = false;

            for (var j = 0; j < cells.length; j++) {
            var cell = cells[j];
            if (cell) {
                var cellText = cell.textContent || cell.innerText;
                if (cellText.toUpperCase().indexOf(filter) > -1) {
                isVisible = true;
                break;
                }
            }
            }
            rows[i].style.display = isVisible ? "" : "none";
        }
        });
    </script>

    <script src="script.js"></script>
</body>
</html>