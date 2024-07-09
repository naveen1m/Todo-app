<?php
require_once 'config.php';
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Prepare a response

// Send the JSON response
// Check if the required data is present
if (isset($data['itemId'])) {
    $itemId = (int)$data['itemId'];
    $response = [
        'data' => $itemId,
    ];
    $sql = "DELETE FROM `todo` WHERE `sno` = $itemId";
    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $response = [
            'status' => 'success',
            'message' => 'Item deleted successfully.'
        ];
       
    } else {
        $error = mysqli_error($conn);
        $response = [
            'status' => 'failed',
            'message' => 'Failed to delete item.',
            'query' => $sql,
            'error' => $error,
            'data' => $data,
            'sno' => $itemId
        ];
    }

} else {
    $response = [
        'status' => 'error',
        'message' => 'Missing required data.'
    ];
}

// Send the JSON response
echo json_encode($response);
?>