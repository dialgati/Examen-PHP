<?php
session_start();
if (!isset($_SESSION['nom'])) {
    // header('location:Login.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Bienvenue chez Fashion Week</h1>
    <?php echo $_SESSION['nom'];
       $stmt = $pdo->prepare("SELECT COUNT(*) as total_membres FROM membres");
       $stmt->execute();
       $total_membres = $stmt->fetchColumn();
    ?>
    <div class="container">
      <section class="stats-grid flex justify-center">
                <div class="card">
                    <h3>Nombre d'utilisateurs</h3>
                    <p><?php echo htmlspecialchars($total_membres); ?></p>
                </div>
                <div class="card">
                    <h3>Nombre de livres</h3>
                    <p><?php echo htmlspecialchars($total_books); ?></p>
                </div>
                <div class="card">
                    <h3>Livres empruntés</h3>
                    <p><?php echo htmlspecialchars($total_emprunts); ?></p>
                </div>
            </section>
      <a href="Logout.php"></a>
    </div>
  </body>
</html>