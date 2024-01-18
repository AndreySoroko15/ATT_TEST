<?php 

class Queries {
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getFromDB($sortingMethod)
    {
        $query =   "SELECT  users.id AS user_id, users.name, 
                            orders.id AS order_id, orders.title, orders.cost 
                    FROM users 
                    INNER JOIN orders ON users.id = orders.user_id ";

        switch ($sortingMethod) {
            case 'id_asc':
                $query .= "ORDER BY order_id ASC";
                break;
        
            case 'id_desc':
                $query .= "ORDER BY order_id DESC";
                break;
        
            case 'name_asc':
                $query .= "ORDER BY users.name ASC";
                break;
        
            case 'name_desc':
                $query .= "ORDER BY users.name DESC";
                break;
        
            case 'title_asc':
                $query .= "ORDER BY orders.title ASC";
                break;
        
            case 'title_desc':
                $query .= "ORDER BY orders.title DESC";
                break;
        
            case 'cost_asc':
                $query .= "ORDER BY orders.cost ASC";
                break;
        
            case 'cost_desc':
                $query .= "ORDER BY orders.cost DESC";
                break;

            case "default":
                $query .= "ORDER BY order_id ASC";
                break;
        }

        $result = $this->connection->query($query);

        if(!$result) {
            die('Ошибка в запросе: ' . $this->connection->error);
        } 

        $data = array();

        while ($rows = $result->fetch_assoc()) {
            $data[] = $rows;
        }

        return $data;
    }
}
