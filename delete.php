<?php 

header("Access-Control-Allow-Origin:");
header("Content-Type: application/json");
header("Access-Control-Allow-Method: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With");

include('config.php');
include('controller.php');

$method = $_SERVER["REQUEST_METHOD"];


if($method == "DELETE"){

    
    $delsnackList = deleteSnackList($_GET);
    echo $delsnackList;

    
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