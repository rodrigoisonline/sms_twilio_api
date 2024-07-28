<?php
// Temporarily hard-code credentials for testing
$account_sid = 'your_account_sid_here';
$auth_token = 'your_auth_token_here';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['phone_number'])) {
    // Twilio credentials
    $account_sid = 'your_account_sid_here'; // Hard-code for testing
    $auth_token = 'your_auth_token_here';   // Hard-code for testing
    
    // Sanitize the phone number input
    $phone_number = filter_var($_POST['phone_number'], FILTER_SANITIZE_STRING);
    
    // URL to Twilio API
    $url = "https://api.twilio.com/2010-04-01/Accounts/$account_sid/Messages.json?To=" . urlencode($phone_number);
    
    // Initialize cURL
    $ch = curl_init($url);
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "$account_sid:$auth_token");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    
    // Execute cURL request and get the response
    $response = curl_exec($ch);
    
    // Check for cURL errors
    if (curl_errno($ch)) {
        die('Error: ' . curl_error($ch));
    }
    
    // Close cURL resource
    curl_close($ch);
    
    // Decode the JSON response
    $messages = json_decode($response, true);
    
    // Display messages if found
    if (isset($messages['messages']) && count($messages['messages']) > 0) {
        foreach ($messages['messages'] as $message) {
            echo "<h2>From: " . htmlspecialchars($message['from']) . "</h2>";
            echo "<h3>To: " . htmlspecialchars($message['to']) . "</h3>";
            echo "<h3>Body: " . nl2br(htmlspecialchars($message['body'])) . "</h3><hr>";
        }
    } else {
        echo "No messages found for this phone number.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check SMS</title>
</head>
<body>
    <form method="post">
        <label for="phone_number">Enter Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required>
        <input type="submit" value="Check SMS">
    </form>
</body>
</html>
