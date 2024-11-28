<?php
$login=0;
$invalid=0;

if ($_SERVER['REQUEST_METHOD']=='POST') {
  include 'configdb.php';
  $nom=$_POST['nom'];
  $password=$_POST['password'];
  
  $sql="select * from `membres` where nom='$nom' and password='$password'";
  $result=mysqli_query($con,$sql);
  if ($result) {
    $num=mysqli_num_rows($result);
    if ($num>0) {
      $login=1;
      session_start();
      $_SESSION['nom']=$nom;
      header('location: Home.php');
    }else {
        $invalid=1;
    }
  } 
}   

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    ntegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <link href="./output.css" rel="stylesheet">
      <link rel="stylesheet" href="style.css">
</head>
<body>
   <?php
  if ($login) {
    echo '<div class="d-flex justify-content-center"><div  class="alert w-50 alert-success alert-dismissible fade show" role="alert">
  <strong>Connecté!</strong> Vous êtes connecté avec succès.
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
</div></div>';
  }
  ?>
  <?php
  if ($invalid) {
    echo '<div class="d-flex justify-content-center"><div  class="alert w-50 alert-danger alert-dismissible fade show" role="alert">
  <strong>Erreur!</strong>Informations invalides.
  <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
</div></div>';
  }
  ?>
  
   <div class="container d-flex justify-content-center mt-5">
     <form class="card shadow-lg p-5 rounded-0 w-50 col-md-6" method="POST" action="Login.php">
      <h1 class="text-center">Connexion</h1>
  <div class="mb-3">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control focus-none" name="nom" >
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control focus-0" name='password'>
  </div>
  <button type="submit" class="btn btn-primary">Connecter</button>
</form>
   </div>
</body>
</html>