<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
   <?php 
   if(isset($_SESSION['inscription']))
   {
    echo"<h1>erreur</h1>";
   }
   ?>
    <div id="inscription" class="col-6 offset-3 mt-4">
    <form action="index.php?ctrl=security&action=inscription" method="post">
      <h3 class="text-center text-success mb-3"> Inscription </h3>
      <div class="mb-3">
        
        <input type="text" class="form-control" id="nom" name="nom"  placeholder=" --entrez votre nom--">
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" id="prenom" name="prenom"  placeholder=" --entrez votre prenom--">
      </div>
      <div>
        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder=" --entrez votre pseudo--" >
      </div>
      <div class="mb-3">
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder=" --entrez votre email--">
      </div>
  <div class="mb-3">
    
    <input type="password" class="form-control" id="password1" name="password" placeholder=" --entrez votre mot de passe--">
  </div>
  <div class="mb-3">
    
    <input type="password" class="form-control" id="pasword2" name="password1"  placeholder=" --tapez une deuxieme fois votre mot de passe--">
    
    <button type="submit" class="btn btn-primary" name="inscription">inscription</button>
  </form>
</div>
<div>
  <form action="index.php?ctrl=security&action=connexion" method="post">
  <div class="mb-3">
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder=" --entrez votre email--">
  </div>
  <div class="mb-3">
    
    <input type="password" class="form-control" id="password1"  name="password" placeholder=" --entrez votre mot de passe--">
  </div>

      
  <button type="submit" class="btn btn-primary" name="connexion">Connexion</button>

  </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    
</body>
</html>