<?php
session_start();

include_once '../api/config/database.php';

$content = '<link href="css/category.css" rel="stylesheet">

<section class="hero-section">
  <div class="card-grid">';

// Create a new instance of the Database class
$database = new Database();
$conn = $database->getConnection();

// Check if the 'idCat' parameter exists in the URL
if (isset($_GET['idCat'])) {
  // Get the value of 'idCat' parameter
  $idCategory = $_GET['idCat'];

  // Fetch the exercises for the specified category
  $sqlExercises = "SELECT * FROM exercices WHERE idExercice IN (SELECT idExercice FROM constitueexos WHERE idCategory = :idCategory)";
  $stmtExercises = $conn->prepare($sqlExercises);
  $stmtExercises->bindValue(':idCategory', $idCategory, PDO::PARAM_INT);
  $stmtExercises->execute();

  if ($stmtExercises !== false) {
    // Display the list of exercises
    $content .= '<h2>Exercises:</h2>';

    while ($row = $stmtExercises->fetch(PDO::FETCH_ASSOC)) {
      $exerciseId = $row['idExercice'];
      $exerciseDesc = $row['descTache'];
      $exerciseStars = $row['stars'];
      $exerciseAuthor = $row['author'];

      $content .= '<a class="card" href=quizz.php?id=' . $exerciseId . '>
                      <div class="card__background" style="background-image: url(../dist/img/category/default.jpg"></div>
                      <div class="card__content">
                      <p class="card__category">Exercice</p>
                      <h3 class="card__heading">' . $exerciseStars . '<img src="../dist/img/category/Star_icon_stylized.svg.png" alt="Star" style="width: 1em; height: 1em;"></h3>
                      <p class="card__desc">' . $exerciseDesc . '</p>
                      <p class="card__desc"> Duration : ' . $exerciseAuthor . ' min</p>
                    </div>
                  </a>';

    }

    // Add a link to go back to the category page
    $content .= '<a href="category.php">Back to Category</a>';
  } else {
    $content .= "No exercises found for the selected category.";
  }
}


$content .= '</div>
</section>';

include('../master.php');
?>
