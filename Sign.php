<?php
$sucess=0;
$user=0;


if ($_SERVER['REQUEST_METHOD']=='POST') {
  include 'configdb.php';
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $adress=$_POST['adress'];
  $code_postal=$_POST['code_postal'];
  $localite=$_POST['localite'];
  $pays=$_POST['pays'];
  $message=$_POST['message'];
  $genre=$_POST['genre'];
  $taille=$_POST['taille'];
  $poids=$_POST['poids'];
  $password=$_POST['password'];
  
   
  $sql="select * from `membres` where nom='$nom'";
  $result=mysqli_query($con,$sql);
  if ($result) {
    $num=mysqli_num_rows($result);
    if ($num>0) {
      echo "Utilisateur existe déjà";
      $user=1;
    }else {
      $sql = "insert into `membres` (nom, prenom, adress, code_postal, localite, pays, message, genre, taille, poids, password) 
  values('$nom', '$prenom', '$adress', '$code_postal', '$localite', '$pays', '$message', '$genre', '$taille', '$poids', '$password')";
  $result = mysqli_query($con,$sql);
  if ($result) {
    // echo 'Inscrit avec success';
    $sucess=1;
    header('location:Login.php');
    }else{
    die(mysql_error($con));
  }
  } 
}   
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    ntegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <link href="./output.css" rel="stylesheet">
      
</head>
<body class="">
  <?php
  if ($user) {
    echo '<div class="d-flex justify-content-center"><div  class="alert w-50 alert-danger alert-dismissible fade show" role="alert">
  <strong>Oh non désolé!</strong> Utilisateur existe déjà.
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
</div></div>';
  }
  ?>

   <?php
  if ($sucess) {
    echo '<div class="d-flex justify-content-center"><div  class="alert w-50 alert-success alert-dismissible fade show" role="alert">
  <strong>Réussi!</strong> Vous êtes inscrit avec succès.
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
</div></div>';
  }
  ?>
    <div class="container d-flex justify-content-center mt-5">
     <form class="card shadow-lg p-5 rounded-0 w-50 col-md-6" method="POST" action="">
      <h1 class="text-center">Inscription</h1>
  <div class="mb-1">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control focus-none" name="nom" >
  </div>
  <div class="mb-1">
    <label class="form-label">Prenom</label>
    <input type="text" class="form-control focus-none" name="prenom" >
  </div>
  <div class="mb-1">
    <label class="form-label">adress</label>
    <input type="text" class="form-control focus-none" name="adress" >
  </div>
  <div class="mb-1">
    <label class="form-label">Code postal</label>
    <input type="text" class="form-control focus-none" name="code_postal" >
  </div>
  <div class="mb-1">
    <label class="form-label">Localite</label>
    <input type="text" class="form-control focus-none" name="localite" >
  </div>
  <div class="mb-1">
    <label class="form-label">Pays</label>
    <input type="text" class="form-control focus-none" name="pays" >
  </div>
  <div class="mb-1">
    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
   <div class="mb-1">
   <select class="form-select" name="genre" aria-label="Default select example">
  <option selected>Genre</option>
  <option value="1">Homme</option>
  <option value="2">Femme</option>
</select>
  </div>
   <div class="mb-1">
    <label class="form-label">Taille</label>
    <input type="number" class="form-control focus-none" name="taille" >
  </div>
   <div class="mb-1">
    <label class="form-label">Poids</label>
    <input type="number" class="form-control focus-none" name="poids" >
  </div>
  <div class="mb-1">
    <label class="form-label">Password</label>
    <input type="password" class="form-control focus-none" name='password'>
  </div>
   <div class="mb-1">
    <label class="form-label">Confirm mot de passe</label>
    <input type="password" class="form-control focus-none" name='password'>
  </div>
  <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>
   </div>
</body>
</html>