<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
 
include_once '../../config/Database.php';
include_once '../../models/Category.php';

//instantiate db and connect
$database = new Database();
$db = $database->connect();


//instantiate blog category object
$category = new Category($db);

//Blog category query
$result = $category->read();
//Get row count
$num = $result->rowCount();

//Check if any category
if ($num > 0) {
    //category array
    $categories_arr = array();
    $categories_arr['data'] = array();
    
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $category_item = array(
            'id' => $id,
            'name' => $name

        );

        //Push to "data"
        array_push($categories_arr['data'], $category_item);
    }

    //Turn to JSON
    echo json_encode($categories_arr); 

}else {
    //No category
    echo json_encode(
        array('message' => 'No Categories Found')
    );
}

?>