<?php


header('Content-Type: text/plain');

$apiKey = getenv('OPENAI_API_KEY');
$model = getenv('OPENAI_MODEL') ?: 'gpt-4.1-mini';

if (!$apiKey) {
    http_response_code(500);
    echo "Error: OPENAI_API_KEY is not configured on the server.";
    exit;
}

if (!isset($_FILES['plantImage'])) {
    http_response_code(400);
    echo "Error: No image received by server.";
    exit;
}

if ($_FILES['plantImage']['error'] !== UPLOAD_ERR_OK) {
    $errorCode = $_FILES['plantImage']['error'];

    http_response_code(400);

    if ($errorCode == UPLOAD_ERR_INI_SIZE || $errorCode == UPLOAD_ERR_FORM_SIZE) {
        echo "Error: Image file is too large. Please take a lower-resolution photo or crop the image and try again.";
    } else {
        echo "Error: Image upload failed. Upload error code: " . $errorCode;
    }

    exit;
}

$tmpPath = $_FILES['plantImage']['tmp_name'];
$mimeType = mime_content_type($tmpPath);

$allowed = ['image/jpeg', 'image/png', 'image/webp'];
if (!in_array($mimeType, $allowed)) {
    http_response_code(400);
    echo "Error: Please upload a JPG, PNG, or WEBP image.";
    exit;
}

$imageData = base64_encode(file_get_contents($tmpPath));
$imageUrl = "data:$mimeType;base64,$imageData";

$payload = [
    "model" => $model,
    "input" => [
        [
            "role" => "user",
            "content" => [
                [
                    "type" => "input_text",
                    "text" => "You are a Smart Farming Assistant.\n\nFirst determine whether the uploaded image is a plant, crop, flower, fruit, vegetable, herb, tree, or farming-related plant image.\n\nIf the image is NOT plant-related, reply only:\nThe uploaded image does not appear to be a plant. Please upload a clear plant image.\n\nIf the image IS plant-related, reply in the following format exactly:\n\nPlant Name:\nScientific Name:\nObserved Condition:\nRecommended Action:\nSunlight:\nTemperature:\nWatering:\nSoil Type:\nFertilizer:\npH Level:\n\nKeep the response concise, practical, and suitable for farmers and home gardeners. If some information cannot be determined from the image alone, provide the most likely recommendation based on the identified plant."
                [
                    "type" => "input_image",
                    "image_url" => $imageUrl
                ]
            ]
        ]
    ]
];

$ch = curl_init("https://api.openai.com/v1/responses");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Authorization: Bearer " . $apiKey
    ],
    CURLOPT_POSTFIELDS => json_encode($payload),
    CURLOPT_TIMEOUT => 60
]);

$response = curl_exec($ch);
$error = curl_error($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($error) {
    http_response_code(500);
    echo "Error connecting to AI service: " . $error;
    exit;
}

$data = json_decode($response, true);

if ($status < 200 || $status >= 300) {
    http_response_code($status);
    echo "Error from AI service: " . ($data['error']['message'] ?? $response);
    exit;
}

if (isset($data['output_text'])) {
    echo $data['output_text'];
    exit;
}

$text = "";
if (isset($data['output'])) {
    foreach ($data['output'] as $item) {
        if (isset($item['content'])) {
            foreach ($item['content'] as $content) {
                if (isset($content['text'])) {
                    $text .= $content['text'];
                }
            }
        }
    }
}

echo $text ?: "Error: No analysis result returned.";
?>
