<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Récupération de Données en AJAX</title>
</head>
<body>
    <h1>Liste des Données</h1>
  <div class="container d-flex justify-content-center align-items-center" style="height:5vh;">

    &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" type="button" href="index.php">Enregistrement</a>&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" type="button" href="liste_groupe.php">Liste groupe</a>

</div>
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



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            var serveur = "<?php echo (getenv('HOST'));?>" ;
            $.ajax({
                type:"GET",
                url:"http://"+serveur+"/liste_globale.php",
                dataType: "json",
                success:function(data)
                {
                    data.forEach(function(vehicule)
                    {
                        var row = "<tr>";
                        row += "<td>" + vehicule.id + "</td>";
                        row += "<td>" + vehicule.plaque + "</td>";
                        row += "<td>" + vehicule.date + "</td>";
                        row += "<tr>" ; 
                        $("#tableau").append(row) ; 
                    });
                }
            });
        });
    </script>
</body>
</html>
