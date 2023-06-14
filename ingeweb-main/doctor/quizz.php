<?php 
session_start();

$testde = isset($_GET['id']) ? $_GET['id'] : null;
// echo $testde;
// echo "test";

$content = '<link href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
  <link rel="stylesheet" href="css/quizz.css">

<div class="container">
<!-- shift left or right -->
<dl id="card-list">
</dl>
</div>


<div class="progress-bar vertical rounded">
  <div class="progress-track">
    <div class="progress-fill">
      <span><div id="current-card-number"></div></span>
    </div>
  </div>
</div>

<div class="d-flex align-items-center justify-content-center vh-101">
  <div class="container">
    <div class="row justify-content-center mb-4">
      <div class="col-lg-8">
        <h5>Comments</h5>
      </div>
    </div>
    <div class="row justify-content-center mb-4">
      <div class="col-lg-8">
        <div class="comments">
';
include_once '../api/config/database.php';

// Assuming you have a database connection established
$database = new Database();
$conn = $database->getConnection();

// Assuming you have the ID of the memo available
$memoId = $_GET['id'];

// Retrieve comments related to the memo from the database
$sql = "SELECT c.idUser, c.comment, u.username, u.image
        FROM commentary c 
        JOIN users u ON c.idUser = u.idUser
        WHERE c.idMemo = :memoId";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':memoId', $memoId);
$stmt->execute();

// Check if there are comments for the memo
if ($stmt->rowCount() > 0) {
    // Loop through each comment and display it
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $idUser = $row['idUser'];
        $comment = $row['comment'];
        $image = $row['image'];
        $name = $row['username'];

        $content .= '<div class="comment d-flex">';
        $content .= '<div class="flex-shrink-0">';
        $content .= '<div class="avatar avatar-sm rounded-circle">';
        $content .= '<img class="avatar-img2test" src="../dist/img/' . $image . '" alt="">';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '<div class="flex-shrink-1 ms-2 ms-sm-3">';
        $content .= '<div class="comment-meta d-flex">';
        $content .= '<h6 class="me-2">&nbsp;&nbsp;&nbsp;' . $name . '</h6>';
        $content .= '<span class="text-muted">&nbsp;&nbsp;4d</span>';
        $content .= '</div>';
        $content .= '<div class="comment-body">' . $comment . '</div>';
        $content .= '</div>';
        $content .= '</div>';
    }
} else {
    $content .= '<p>No comments found.</p>';
}

$content .= '
</div>
</div>
</div>
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="comment-form d-flex align-items-center">
<div class="flex-shrink-0">
<div class="avatar avatar-sm rounded-circle">';

if(ISSET($_SESSION['email'])){

$content .= '
<img class="avatar-img2test" src="../dist/img/' . $_SESSION['image'] . '" alt="">
</div>
</div>
<div class="flex-grow-1 ms-2 ms-sm-3">
<form id="comment-form">
<textarea id="comment-text" class="form-control py-0 px-1 border-0 rounded-lg" rows="1" placeholder="Start writing..." style="resize: none; margin-left:0.5cm;"></textarea>
</form>
</div>
<div class="flex-shrink-0">
<button id="comment-submit" class="btn btn-primary">Enter</button>
</div>
</div>
</div>
</div>
</div>
</div>';
}
// Add JavaScript code to handle the submit button click event
$content .= '
<script>
document.getElementById("comment-submit").addEventListener("click", function(e) {
    e.preventDefault();
    var commentText = document.getElementById("comment-text").value;
    
    // Perform an AJAX request to insert the new commentary into the table
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "insert_comment.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response from the server if needed
        }
    };
    xhr.send("comment=" + commentText);
    
    // Clear the textarea after submitting the comment
    document.getElementById("comment-text").value = "";
});
</script>';



include_once '../master.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
<script src="js/quizz.js">
</script>
