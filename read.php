<?php 

header("Access-Control-Allow-Origin:");
header("Content-Type: application/json");
header("Access-Control-Allow-Method: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With");

include('config.php');
include('controller.php');

$method = $_SERVER["REQUEST_METHOD"];


if($method == "GET"){

    if(isset($_GET['calories'])){
        $calories = byCalories($_GET);
        echo $calories;
    }
    elseif(isset($_GET['type'])){
        $type = byType($_GET);
        echo $type;
    }
    elseif(isset($_GET['quantity']))
    {
        $quantity = byQuantity($_GET);
        echo $quantity;
    }
    else{
        $snackList = getSnackList();
        echo $snackList;
    }
    
}
else{
    $data = [
                'status' => 405,
                'message' => $method. 'Method Not Allowed'
            ];
            header("HTTP/1.0 405 Method Not Allowed");
            echo json_encode($data);
}



?>