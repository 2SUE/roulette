<?php 
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Credentials", "true");
    header('Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers');
    header('Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS');

    $json = json_decode(file_get_contents('php://input'), true);
 
    include_once "./dbconn.php";

    $query = "SELECT regdt, item FROM roulette WHERE user_id = :val ORDER BY id DESC LIMIT 1;"; 
    $stmt = $pdo->prepare($query); 
    $stmt->bindValue(':val', $json["id"], PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_NUM); 

    if ($result) {
        $res = explode(" ", $result[0])[0];
        $now = date("Y-m-d");
        echo json_encode([$res == $now, $result[1]]);
    } else {
        echo json_encode(false);
    }
?>