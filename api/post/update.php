<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Header: Access-Control-Allow-Header, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
include_once '../../config/Database.php';
include_once '../../models/Post.php';

//instantiate db and connect
$database = new Database();
$db = $database->connect();


//instantiate blog post object
$post = new Post($db);

//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

//SET ID to be updated
$post->id = $data->id;

$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;

//Update Post
if ($post->update()) {
   echo json_encode(
       array('message' => 'Post Updated Successfully')
   );
}else {
    echo json_encode(
        array('message' => 'Post Not Updated')
    );
}


?>