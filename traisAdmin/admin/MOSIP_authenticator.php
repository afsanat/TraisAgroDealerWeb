<?php
// Configuration
$mosipApiUrl = "https://api-internal.collab.mosip.net/idauthentication/v1/key-auth/delegated/{IdP-LK}​/{Auth-Partner-ID}​/{oidc-client-id}"; // Replace with the actual endpoint
$apiKey = "your-api-key"; // Replace with your API key

// Function to verify identity
function verifyIdentity($identityNumber) {
    global $mosipApiUrl, $apiKey;

    // Prepare data for API request
    $data = array("identityNumber" => $identityNumber);
    $dataJson = json_encode($data);

    // Initialize cURL session
    $ch = curl_init($mosipApiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);

    // Execute cURL request and get response
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Check response
    if ($httpCode == 200) {
        $responseData = json_decode($response, true);
        if ($responseData['status'] == 'success') {
            return $responseData; // Return detailed verification data
        } else {
            return false; // Identity verification failed
        }
    } else {
        // Handle error response
        return false;
    }
}

// Example usage
$identityNumber = $_POST['identityNumber']; // Assume this comes from form submission
$verificationResult = verifyIdentity($identityNumber);

if ($verificationResult) {
    echo "Identity verified successfully. Data: " . print_r($verificationResult, true);
    // Process verification data
} else {
    echo "Identity verification failed. Please check the ID.";
}

