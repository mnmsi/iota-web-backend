<?php
// headers
header("Access-Control-Allow-Origin", "https://iotait.tech");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods", "DELETE, POST, GET, OPTIONS");
include_once "../config/Database.php";
include_once "../Models/Post.php";

// instantiate DB & connect

$database = new Database();
$db = $database->connect();
$post = new Post($db);

//$data = json_decode(file_get_contents("php://input"));
$post->name = $_REQUEST["name"];
$post->email = $_REQUEST["email"];
if ($post->create()) {
    echo json_encode(array(
        "status" => 1,
        "message" => "Post Created",
    ));
} else {
    echo json_encode(array(
        "status" => 0,
        "message" => "Something goes wrong",
    ));
}