<?php
header('Content-Type: text/plain');

$apiKey = getenv('OPENAI_API_KEY');
$model = getenv('OPENAI_MODEL') ?: 'gpt-4.1-mini';

if (!$apiKey) {
    http_response_code(500);
    echo "Error: OPENAI_API_KEY is not configured on the server.";
    exit;
}

if (!isset($_FILES['plantImage']) || $_FILES['plantImage']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo "Error: No image uploaded. Please upload a clear plant image.";
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
                    "text" => "You are a plant image checker. First decide whether the uploaded image is actually a plant, crop, leaf, flower, fruit, tree, or farming-related plant image. If it is NOT a plant-related image, reply only: The uploaded image does not appear to be a plant. Please upload a clear plant image for analysis. If it is plant-related, analyse it in 5 short points: 1. Possible plant condition, 2. Visible symptoms, 3. Likely causes, 4. Care advice, 5. Confidence level."
                ],
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
