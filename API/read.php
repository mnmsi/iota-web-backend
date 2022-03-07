<?php
// headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "../config/Database.php";
include_once "../Models/Post.php";

// instantiate DB & connect

$database = New Database();
$db = $database->connect();

// Instantiate Post Object

$post = new Post($db);

$result = $post->read();

$num = $result->rowCount();

if($num > 0) {
    $posts_arr = array();    
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'id' => $id,
            'name' => $name,
            'email' => $email,

        );
        array_push($posts_arr,$post_item);
    }

    // Turn to JSON output
    echo json_encode(array(
        "status"=>1,
        "data"=>$posts_arr
    ));
} else {
    echo json_encode(
        array( "status"=>0,
            "message"=>'No User Found',
           
        )
    );
}