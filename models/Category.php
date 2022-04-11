<?php
class Category {
    //db stuff
    private $conn;
    private $table = 'categories';

    //post properties
    public $id;
    public $name;
    public $created_at;

    //constructor with db
    public function __construct($db) {
        $this->conn = $db;
    }

    //GET ALL CATEGORIES
    public function read() {
        //create query
        $query = 'SELECT 
        id,
        name,
        created_at
        FROM
        ' . $this->table . ' 
        ORDER BY
        created_at DESC';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //execute the query
        $stmt->execute();

        return $stmt;
    }

}
?>