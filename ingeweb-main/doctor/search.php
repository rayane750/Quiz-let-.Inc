<?php
include_once '../api/config/database.php';
include_once '../api/objects/exercice.php';
session_start();


$content = '<link href="css/category.css" rel="stylesheet">
<h2> Results </h2>
<section class="hero-section">
  <div class="card-grid">';

$database = new Database();
$db = $database->getConnection();

$keyword = $_GET['keyword'];
// prepare doctor object
$ex = new Exo($db);

$stmt = $ex->read($keyword);
$num = $stmt->rowCount();


// check if more than 0 record found
if($num>0){
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
                        <p class="card__desc"> Author : ' . $exerciseAuthor . ' </p>
                      </div>
                    </a>';
  
      }
} else {
    $content .= 'No exercises found.';
}

$content .= '</div>
</section>';

include('../master.php');

?>
