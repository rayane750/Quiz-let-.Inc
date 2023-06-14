<?php
// Assuming you have a database connection established
$database = new Database();
$conn = $database->getConnection();

// Retrieve the comment from the request
$comment = $_POST['comment'];

// Assuming you have the user ID available in the session
$userId = $_SESSION['userId'];

// Assuming you have the memo ID available (you may pass it as a parameter in the AJAX request)
$memoId = $_GET['id'];

// Insert the comment into the commentary table
$sql = "INSERT INTO commentary (idMemo, idUser, comment) VALUES (:memoId, :userId, :comment)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':memoId', $memoId);
$stmt->bindParam(':userId', $userId);
$stmt->bindParam(':comment', $comment);

if ($stmt->execute()) {
    // Comment insertion successful
    echo "Comment inserted successfully.";
} else {
    // Comment insertion failed
    echo "Failed to insert comment.";
}
?>
