<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
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

//SET ID to be Deleted
$post->id = $data->id;

//Delete Post
if ($post->delete()) {
   echo json_encode(
       array('message' => 'Post Deleted Successfully')
   );
}else {
    echo json_encode(
        array('message' => 'Post Not Deleted')
    );
}
?>