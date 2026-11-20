<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include('cnn.php'); // your DB connection

// Check POST
$nama     = isset($_POST['nama']) ? $_POST['nama'] : '';
$ic       = isset($_POST['ic']) ? $_POST['ic'] : '';
$memberid = isset($_POST['memberid']) ? $_POST['memberid'] : '';

if($nama == "" || $ic == "" || $memberid == ""){
    echo json_encode([
        "status" => "error",
        "message" => "All fields are required."
    ]);
    exit();
}

$sql = "INSERT INTO user (nama, ic, memberid) VALUES ('$nama', '$ic', '$memberid')";
$query = mysqli_query($conn, $sql);

if($query){
    echo json_encode([
        "status" => "success",
        "message" => "Data inserted successfully."
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Insert failed: " . mysqli_error($conn)
    ]);
}
?>
