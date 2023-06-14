<?php
session_start();

include_once '../api/config/database.php';

$content = '<link href="css/category.css" rel="stylesheet">

<section class="hero-section">
  <div class="card-grid">';

// Create a new instance of the Database class
$database = new Database();
$conn = $database->getConnection();

// Assuming you have a database connection established
$sql = "SELECT * FROM category";
$stmt = $conn->query($sql);

if ($stmt !== false) {
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $categoryName = $row['titleCat'];
    $backgroundImage = $row['photoCat'];
    $catDesc = $row['descCat'];
    $catDur = $row['duration'];
    $idCategory = $row['idCategory'];

    if($backgroundImage!=NULL) 
    $content .= '<a class="card" href=exercice.php?idCat=' . $idCategory . '>
                    <div class="card__background" style="background-image: url(../dist/img/category/' . $backgroundImage . ')"></div>
                    <div class="card__content">
                      <p class="card__category">Category</p>
                      <h3 class="card__heading">' . $categoryName . '</h3>
                      <p class="card__desc">' . $catDesc . '</p>
                      <p class="card__desc"> Duration : ' . $catDur . ' min</p>
                    </div>
                  </a>';
    else
    $content .= '<a class="card" href=exercice.php?idCat=' . $idCategory . '>
                    <div class="card__background" style="background-image: url(../dist/img/category/default.jpg"></div>
                    <div class="card__content">
                      <p class="card__category">Category</p>
                      <h3 class="card__heading">' . $categoryName . '</h3>
                      <p class="card__desc">' . $catDesc . '</p>
                      <p class="card__desc"> Duration : ' . $catDur . ' min</p>
                    </div>
                  </a>';
  }
} else {
  $content .= "No categories found.";
}

$content .= '</div>
</section>';

include('../master.php');
?>
