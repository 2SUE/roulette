<?php 
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Credentials", "true");
    header('Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers');
    header('Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS');

    $json = json_decode(file_get_contents('php://input'), true);

    include_once "./dbconn.php";
    
    $query = "INSERT INTO roulette (user_id, item) VALUES (:val1, :val2);"; 
    $stmt = $pdo->prepare($query); 
    $stmt->bindValue(':val1', $json["id"], PDO::PARAM_INT); 
    $stmt->bindValue(':val2', $json["item"], PDO::PARAM_STR);  
    $stmt->execute();
    echo 1;
?>