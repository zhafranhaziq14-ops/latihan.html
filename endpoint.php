<?php

header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); 
header("Access-Control-Allow-Headers: Content-Type");
// Set default response content type
header('Content-Type: application/json');

// Include database connection
include("cnn.php");

$_POST['cari'] = $_POST['cari'] ?? null;

if($_POST['cari']<>NULL){

// SQL query to search for users by IC
$sql = "SELECT * FROM `haziqhensem` WHERE `ic` LIKE '%".$_POST['cari']."%' ";
$dataapi = mysqli_query($conn, $sql);

// Prepare response structure
$response = [];

if ($dataapi) {
    $data = [];

    while ($row = mysqli_fetch_assoc($dataapi)) {
        $data[] = $row;
    }

    http_response_code(200); // OK
    $response = [
        'status' => 'success',
        'code' => 200,
        'message' => count($data) > 0 ? 'Data retrieved successfully.' : 'No data found.',
        'data' => $data
    ];
} else {
    http_response_code(500); // Internal Server Error
    $response = [
        'status' => 'error',
        'code' => 500,
        'message' => 'Database query failed: ' . mysqli_error($conn),
        'data' => null
    ];
}

// Output JSON response
echo json_encode($response);

// Close the database connection
mysqli_close($conn);

}

?>
