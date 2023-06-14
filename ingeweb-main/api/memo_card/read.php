<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/memo.php';
// include_once  '../../doctor/quizz.php';
// include('../../master.php');
$referring_url = $_SERVER['HTTP_REFERER'];
// Parse the URL to extract the query string
$query_string = parse_url($referring_url, PHP_URL_QUERY);

// Parse the query string to extract the parameter values
parse_str($query_string, $params);

// Access the 'id' parameter value
$id = $params['id'];
// echo $id;
// echo __FILE__;
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare doctor object
$memo_card = new memo($db);

// http://localhost/ingeweb-main/doctor/quizz.php?id=3
// query memo_cards
// get the ID from the URL

// query memo_cards
$stmt = $memo_card->read($id);
$num = $stmt->rowCount();


// check if more than 0 record found
if($num>0){
 
    // memo array
    $memo_card_arr = array();
    $memo_card_arr["memo_card"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $memo_card_item=array(
            "idMemo" => $idMemo,
            "question" => $question,
            "reponse" => $reponse
        );
        array_push($memo_card_arr["memo_card"], $memo_card_item);
    }
    ///var_dump($memo_card_arr);
    echo json_encode($memo_card_arr["memo_card"]);
}
else{
    echo json_encode(array());
}
?>