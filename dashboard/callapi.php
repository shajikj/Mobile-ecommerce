<?php 
    
// Build URL with query params
$url = "http://localhost/ecomm-mobile/dashboard/api.php";
$data = array(
    'calculate_two_numbers' => true,
    'num1' => 10,
    'num2' => 20
);

// Initialize CURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// Execute
$response = curl_exec( $ch);
//echo $response;
//die();
curl_close($ch);

// Convert JSON to Array
//$data = json_decode($response, true);

// Print result
echo "<pre>";
?>