<?php
require_once("config/database.php");

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if all required fields are present
    if (isset($_POST['product_id']) && isset($_POST['user_id']) && isset($_POST['review_text'])) {

        $product_id = $_POST['product_id'];
        $user_id = $_POST['user_id'];
        $review_text = "'".$_POST['review_text']."'";

        $data = $conn->prepare("INSERT INTO product_review (product_id, user_id, review_text) VALUES ($product_id, $user_id, $review_text)");

        if ($data->execute()) {
            $response = array(
                'status' => 'success',
                'message' => 'Data inserted successfully',
                'data' => array(
                    'product_id' => $product_id,
                    'user_id' => $user_id,
                    'review_text' => $review_text
                )
            );
        } else {
            $response = array(
                'status' => 'Failed',
                'message' => 'Data is not inserted successfully',
            );
        }


        
        echo json_encode($response);
        
    } else {
        $response = array('status' => 'error', 'message' => 'Missing required fields');
        echo json_encode($response);
    }

} else {
    $response = array('status' => 'error', 'message' => 'Invalid request method');
    echo json_encode($response);
}
$conn->close();
?>
