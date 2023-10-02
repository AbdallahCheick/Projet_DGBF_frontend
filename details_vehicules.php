<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails des véhicules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <span id="titre"></span>
    <div class="row h-100 justify-content-center align-items-center">
        <table class="table table-bordered table-hover w-50 text-center"  >
            <thead>
                <tr class='table-secondary'>
                    <th>ID</th>
                    <th>Plaque</th>
                    <th>date</th>
                </tr>
            </thead>
            <tbody id="listeVehicules"></tbody>
        </table>
    </div>
    <div class="container d-flex justify-content-center align-items-center" style="height:5vh;">
        <a class="btn btn-danger" type="button" href="liste_groupe.php">Retour</a> <br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   <script>
        // Récupérez la date et l'heure depuis l'URL
        var urlSearchParams = new URLSearchParams(window.location.search);
        var date = urlSearchParams.get("date");
        var heure = urlSearchParams.get("heure");
        var serveur = "<?php echo (getenv('HOST'));?>" ;
        $.ajax({
            type: "GET", // Utilisez GET pour obtenir les données du serveur
            url: "http://"+serveur+"/details_vehicules.php",
            dataType: "json",
            data: {
                date: date,
                heure: heure
            },
            success: function(data) {
                var head = "<h2>Liste des véhicules pour le " + date + " à " + heure + " H :</h2>";
                var row = "" ; 
                    data.forEach(function(vehicule)
                    {
                        row += "<tr>";
                        row += "<td>" + vehicule.id + "</td>";
                        row += "<td>" + vehicule.plaque + "</td>";
                        row += "<td>" + vehicule.date + "</td>";
                        row += "<tr>" ; 
                    });
                $("#listeVehicules").html(row);
                $("#titre").html(head) ; 
            },
        });
    </script>
</body>
</html>
