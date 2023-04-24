<?php 
//error_reporting(0);

header("Access-Control-Allow-Origin:");
header("Content-Type: application/json");
header("Access-Control-Allow-Method: PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With");

include('config.php');
include('controller.php');

$method = $_SERVER["REQUEST_METHOD"];


if($method == "PUT"){
    $inputData = json_decode(file_get_contents("php://input"), true);
    if(empty($inputData)){
        $updateSnack = updateSnack($_POST, $_GET);

    }
    else{
        $updateSnack = storeSnack($inputData, $_GET);
    }
    echo $updateSnack;

}
else{
    $storeSnack = storeSnack($inputData);
    $data = [
        'status' => 405,
        'message' => $method. 'Method Not Allowed'
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data); 
}
?>