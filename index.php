<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'enregistrement de plaque d'immatriculation</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <section class="vh-100" style="background-color: #ffffff;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;background-color: #dfe2e7;">
            <div class="card-body p-5 text-center">
  
              <h3 class="mb-5">PARKING</h3>
  
              <div class="form-outline mb-4">
                <input type="text" name="plaque" id="plaque" maxlength="8" minlength="8" placeholder="Entrer la plaque du vehicule" pattern="[0-9]{4}[A-Za-z]{2}[0-9]{2}" title="Le format attendu est 1234AB12 en respectant la casse." required class="form-control form-control-lg" />  
              </div>

              <button class="btn btn-primary btn-lg" type="button" onclick="traitement()">Enregistrer</button>
  
              <hr class="my-4">

              <div class="container d-flex justify-content-center align-items-center" style="height:5vh;">
                <a class="btn btn-primary " href="affichage_liste_globale.php">Liste des véhicules</a>&nbsp;
                <a class="btn btn-primary " href="recherche.php">Rechercher un véhicule</a>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <br>
    <br><br><br><br><br><br>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    function traitement() {
      event.preventDefault();
        var plaque = $('#plaque').val();
        plaque = plaque.toUpperCase();
        var serveur = "<?php echo (getenv('HOST'));?>" ;
        if(plaque != "")
        {

        $.ajax({
            type: "POST",
              url: "http://"+serveur+"/enregistrement.php",
            dataType: "text",
            data: JSON.stringify({
                plaque: plaque,
                enregistrer: true  
            }),
            contentType: "application/json",
            success: function(data) {
                $("#plaque").val('');
                alert(plaque+" à été enregistré avec Success");
            },
            error: function(xhr, status, error) {
               alert(status + ": " + xhr.responseText); 
            }
            
        });
      }
      else
      {
        alert("Veuillez renseignez une plaque") ; 
      }
    }
</script>
</html>
