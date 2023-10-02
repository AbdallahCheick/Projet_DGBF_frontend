<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de véhicules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Recherche de véhicules</h1>
    <form >
        
        <label for="date_debut">Date et Heure de début :</label>
        <input type="datetime-local" name="date_heure_debut" id="date_heure_debut">
        
        <label for="date_fin">Date et Heure de fin :</label>
        <input type="datetime-local" name="date_heure_fin" id="date_heure_fin">

        <label for="plaque">Plaque d'immatriculation :</label>
        <input type="text" name="plaque" id="plaque" placeholder="Entrer la plaque" maxlength="8" minlength="8">
        
        <!-- Utilisez le gestionnaire d'événements onclick pour appeler la fonction traitement() -->
        
        <input type="reset" class="btn btn-danger" value="Effacer">&nbsp;
        <button  class="btn btn-primary" id="rechercher" name="rechercher" onclick="recherche()">Rechercher</button>
    </form> <br>
    <a class="btn btn-danger " href="index.php">Retour</a>
    

    <br><br>
    
    <div class="row h-100 justify-content-center align-items-center">
        <table id="data-table" class="table table-bordered table-hover w-50 text-center"  >
            <caption></caption>
            <thead>
                <tr class="table-secondary">
                    <th scope="col">ID</th>
                    <th scope="col">Plaque</th>
                    <th scope="col">Date et Heure</th>
                </tr>
            </thead>
            <tbody id="tableau"></tbody>
        </table>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function recherche() {
    event.preventDefault();
        // Récupérez les données du formulaire
        var date_heure_debut = $("#date_heure_debut").val();
        var date_heure_fin = $("#date_heure_fin").val();
        var plaque = $("#plaque").val();
        var serveur = "<?php echo (getenv('HOST'));?>" ;
        $.ajax({
            type: "GET",
            url: "http://"+serveur+"/recherche.php?date_heure_debut="+ date_heure_debut+"&date_heure_fin="+ date_heure_fin+"&plaque="+plaque,
            dataType: "json",
            success: function(data) {
                $("#tableau").empty(); 
                data.forEach(function(vehicule) {
                    var row = "<tr>";
                    row += "<td>" + vehicule.id + "</td>";
                    row += "<td>" + vehicule.plaque + "</td>";
                    row += "<td>" + vehicule.date + "</td>";
                    row += "</tr>";
                    $("#tableau").append(row);
                });
            },
            error: function(xhr, status, error) {
               alert(status + " : " + xhr.responseText); 
            }
        });
    }
    
    
    </script>
</html>
