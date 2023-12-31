<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage de tous les véhicules par jour et heure</title>
</head>
<body>
    <h1>Liste de tous les véhicules enregistrés par jour et heure</h1>
    <h2>Résultats :</h2><a href="affichage_liste_globale.php">Retour</a> <br> <a href="liste_groupe.php">Résumé</a>
    <table>
        <tbody id="resultats"></tbody>
    </table>

    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var serveur = "<?php echo (getenv('HOST'));?>" ;
            $.ajax({
                type: "GET",
                url: "http://"+serveur+"/liste_trie.php",
                dataType: "json",
                success: function(data) {
                    // Manipulez les données ici et affichez-les dans #resultats
                    var resultatsHtml = "";

                    data.forEach(function(valeur) {
                        resultatsHtml += "<tr><td colspan=\"2\">Date: " + valeur.date_fr + ", Heure: " + valeur.heure + "</td></tr>";
                        resultatsHtml += "<tr><td>Id</td><td>Plaque</td></tr>";
                        valeur.vehicules.forEach(function(vehicule) {
                            resultatsHtml += "<tr><td>" + vehicule.id + "</td><td>" + vehicule.plaque + "</td></tr>";
                        });
                        resultatsHtml += "<tr><td colspan=\"2\">Nombre de véhicules: " + valeur.nombre_vehicules + "</td></tr>";
                    });

                    $("#resultats").html(resultatsHtml);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
</body>
</html>
