<?php
// headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Accept");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
include_once "../config/Database.php";
include_once "../Models/Post.php";

// instantiate DB & connect

$database = new Database();
$db = $database->connect();
error_reporting(E_ALL);
$post = new Post($db);

$data = json_decode(file_get_contents("php://input"));
$post->name = $data->name;
$post->email = $data->email;
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