<?php
// QORTA Demo Request Handler
// This file handles form submissions and sends emails via Resend API

header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Get form data
$name = htmlspecialchars($_POST['name'] ?? '');
$business = htmlspecialchars($_POST['business'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
$phone = htmlspecialchars($_POST['phone'] ?? 'Not provided');

// Validate required fields
if (empty($name) || empty($business) || !$email) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

// Resend API configuration
$resendApiKey = 'YOUR_RESEND_API_KEY_HERE'; // Replace with your actual API key
$resendApiUrl = 'https://api.resend.com/emails';

// Prepare email data
$emailData = [
    'from' => 'QORTA Website <onboarding@resend.dev>', // Replace with your verified domain
    'to' => 'anopashekajokoto1@gmail.com',
    'subject' => 'New QORTA Demo Request',
    'html' => "
        <h2>New Demo Request from QORTA Website</h2>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Business:</strong> {$business}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Phone:</strong> {$phone}</p>
        <hr>
        <p><small>Submitted on " . date('Y-m-d H:i:s') . "</small></p>
    "
];

// Send request to Resend API
$ch = curl_init($resendApiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($emailData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $resendApiKey
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Check if email was sent successfully
if ($httpCode >= 200 && $httpCode < 300) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to send email']);
}
?>
