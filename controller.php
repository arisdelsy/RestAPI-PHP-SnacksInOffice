<?php

function updateSnack($snackInput, $snackParam){
    global $conn;

    if(!isset($snackParam['id'])){
        return "Customer ID not Found in URL";
    }
    else{
        return "Enter Customer ID";

    }

    $id = mysqli_real_escape_string($conn, $snackInput['id']);

    $snackName = mysqli_real_escape_string($conn, $snackInput['snackName']);
    $calories = mysqli_real_escape_string($conn, $snackInput['calories']);
    $quantity = mysqli_real_escape_string($conn, $snackInput['quatity']);
    $type = mysqli_real_escape_string($conn, $snackInput['type']);
    $inFridge = mysqli_real_escape_string($conn, $snackInput['inFridge']);

    $query = "UPDATE Snacks SET snackName='$snackName', calories='$calories', quantity='$quantity', type='$type', inFridge='$inFridge' WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result){

        $data = [
            'status' => 200,
            'message' => 'Customer Updated'
        ];
        header("HTTP/1.0 200 Updated");
        echo json_encode($data);

    }
    else{
        $data = [
            'status' => 500,
            'message' => 'Server Error'
        ];
        header("HTTP/1.0 505 Internal Server Error");
        echo json_encode($data);
    }

}

function byCalories($calsInput){
    global $conn;
    $calories = mysqli_real_escape_string($conn, $calsInput['calories']);

    $query = "SELECT * FROM Snacks WHERE calories = '$calories'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $data = [
            'status' => 200,
            'message' => 'Snack List Fetched Successfully',
            'data' => $result];
        header("HTTP/1.0 200 OK");
        return json_encode($data);
    }
    else{
        $data = [
            'status' => 404,
            'message' => 'Snacks by Calories Not Found'];
        header("HTTP/1.0 404 Not Found");
        return json_encode($data);
    }
}

function byType($typeInput){
    global $conn;
    $type = mysqli_real_escape_string($conn, $typeInput['type']);

    $query = "SELECT * FROM Snacks WHERE type = '$type' ";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $data = [
            'status' => 200,
            'message' => 'Snack List Fetched Successfully',
            'data' => $result];
        header("HTTP/1.0 200 OK");
        return json_encode($data);
    }
    else{
        $data = [
            'status' => 404,
            'message' => 'Snacks by Type Not Found'];
        header("HTTP/1.0 404 Not Found");
        return json_encode($data);
    }
    
}

function byQuantity($quantityInput){
    global $conn;
    $quantity = mysqli_real_escape_string($conn, $quantityInput['quantity']);

    $query = "SELECT * FROM Snacks WHERE quantity = 0 ";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $data = [
            'status' => 200,
            'message' => 'Snack List Fetched Successfully',
            'data' => $result];
        header("HTTP/1.0 200 OK");
        return json_encode($data);
    }
    else{
        $data = [
            'status' => 404,
            'message' => 'Snacks by Quantity Not Found'
        ];
        header("HTTP/1.0 404 Not Found");
        return json_encode($data);
    }
    
}

function storeSnack($snackInput){
    global $conn;
    $snackName = mysqli_real_escape_string($conn, $snackInput['snackName']);
    $calories = mysqli_real_escape_string($conn, $snackInput['calories']);
    $quantity = mysqli_real_escape_string($conn, $snackInput['quatity']);
    $type = mysqli_real_escape_string($conn, $snackInput['type']);
    $inFridge = mysqli_real_escape_string($conn, $snackInput['inFridge']);

    $query = "INSERT INTO Snacks (snackName, calories, quantity, type, inFridge) VALUES ('$snackName', '$calories', '$quantity', '$type', '$inFridge')";
    $result = mysqli_query($conn, $query);

    if($result){

        $data = [
            'status' => 201,
            'message' => 'Customer Created'
        ];
        header("HTTP/1.0 201 Created");
        echo json_encode($data);

    }
    else{
        $data = [
            'status' => 500,
            'message' => 'Method Not Allowed'
        ];
        header("HTTP/1.0 505 Internal Server Error");
        echo json_encode($data);
    }
}

function getSnackList(){
    global $conn;
    $query = "SELECT * FROM Snacks";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run){
        if(mysqli_num_rows($query_run) > 0){
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Snack List Fetched Successfully',
                'data' => $res];
            header("HTTP/1.0 200 OK");
            return json_encode($data);
        }
        else{
            $data = [
                'status' => 405,
                'message' => 'Method Not Allowed'];
            header("HTTP/1.0 405 Method Not Allowed");
            return json_encode($data);
        }

    }
    else{
        $data = [
            'status' => 500,
            'message' => 'Method Not Allowed'];
        header("HTTP/1.0 505 Internal Server Error");
        echo json_encode($data);
    }
};

function deleteSnackList($snacks){
    global $conn;

    $id = mysqli_real_escape_string($conn, $snacks['id']);
    $query = "DELETE FROM Snacks WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result){

        $data = [
            'status' => 204,
            'message' => 'Snack Deleted',
            'data' => $result];
        header("HTTP/1.0 200 OK");
        return json_encode($data);

    }
    else{
        $data = [
            'status' => 404,
            'message' => 'Not Found'];
        header("HTTP/1.0 404 Not Found");
        echo json_encode($data);

    }
}

?>