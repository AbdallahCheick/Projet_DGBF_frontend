<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Liste groupé</title>
</head>
<body>
    <h1>Liste de tous les véhicules enregistrés par jour et heure</h1>
    
    <div class="row h-100 justify-content-center align-items-center">
        <table class="table table-bordered table-hover w-50 text-center"  >
        <tbody id="resultats"></tbody>
    </table>
    </div>
    <div class="container d-flex justify-content-center align-items-center" style="height:5vh;">
        <a class="btn btn-danger" type="button" href="affichage_liste_globale.php">Retour</a> <br>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        $(document).ready(function() {
            var serveur = "<?php echo (getenv('HOST'));?>" ;
            $.ajax({
                type: "GET",
                url: "http://"+serveur+"/liste_group.php",
                dataType: "json",
                success: function(data) {
                    // Manipulez les données ici et affichez-les dans #resultats
                    var resultatsHtml = "";
                    resultatsHtml += "<tr class='table-secondary'><th scope='col'>Date</th><th scope='col'>Heure</th><th scope='col'>Nombre de vehicule</th><th scope='col'>Detail</th></tr> " ;
                    data.forEach(function(valeur) {
                        resultatsHtml += "<tr><td>"+ valeur.date_fr + "</td><td>" + valeur.heure + "</td><td>"+valeur.nombre_vehicules+
                            "</td><td><a href='details_vehicules.php?date=" +valeur.date_fr + "&heure=" + valeur.heure + "'>Détail</a></td></tr>";
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
