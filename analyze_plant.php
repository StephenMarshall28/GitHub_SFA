<?php
header('Content-Type: application/json');

function send_json($status, $data) {
    http_response_code($status);
    echo json_encode($data);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    send_json(405, ['success' => false, 'error' => 'Only POST requests are allowed.']);
}

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    send_json(400, ['success' => false, 'error' => 'Please upload a valid plant image.']);
}

$apiKey = getenv('OPENAI_API_KEY');
if (!$apiKey) {
    send_json(500, [
        'success' => false,
        'error' => 'OPENAI_API_KEY is not configured on the server.'
    ]);
}

$file = $_FILES['image'];
$maxBytes = 8 * 1024 * 1024; // 8 MB
if ($file['size'] > $maxBytes) {
    send_json(400, ['success' => false, 'error' => 'Image is too large. Please upload an image below 8 MB.']);
}

$finfo = new finfo(FILEINFO_MIME_TYPE);
$mimeType = $finfo->file($file['tmp_name']);
$allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
if (!in_array($mimeType, $allowedTypes, true)) {
    send_json(400, ['success' => false, 'error' => 'Unsupported image type. Please upload JPG, PNG, WEBP, or GIF.']);
}

$imageData = base64_encode(file_get_contents($file['tmp_name']));
$dataUrl = 'data:' . $mimeType . ';base64,' . $imageData;

$payload = [
    'model' => getenv('OPENAI_MODEL') ?: 'gpt-4.1-mini',
    'input' => [
        [
            'role' => 'user',
            'content' => [
                [
                    'type' => 'input_text',
                    'text' => "You are a Smart Farming Assistant. Analyze the plant image for a student web project. Return a concise, helpful result with these sections:\n1. Possible plant condition\n2. Visible symptoms\n3. Likely causes\n4. Care advice\n5. Confidence level\nKeep it simple. Do not claim certainty. If the image is unclear, say so."
                ],
                [
                    'type' => 'input_image',
                    'image_url' => $dataUrl
                ]
            ]
        ]
    ],
    'max_output_tokens' => 450
];

$ch = curl_init('https://api.openai.com/v1/responses');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ],
    CURLOPT_POSTFIELDS => json_encode($payload),
    CURLOPT_TIMEOUT => 60
]);

$response = curl_exec($ch);
$curlError = curl_error($ch);
$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response === false) {
    send_json(500, ['success' => false, 'error' => 'AI request failed: ' . $curlError]);
}

$result = json_decode($response, true);
if ($statusCode < 200 || $statusCode >= 300) {
    $message = $result['error']['message'] ?? 'AI service returned an error.';
    send_json(500, ['success' => false, 'error' => $message]);
}

$analysis = '';
if (isset($result['output_text'])) {
    $analysis = $result['output_text'];
} elseif (isset($result['output']) && is_array($result['output'])) {
    foreach ($result['output'] as $outputItem) {
        if (!isset($outputItem['content']) || !is_array($outputItem['content'])) {
            continue;
        }
        foreach ($outputItem['content'] as $contentItem) {
            if (isset($contentItem['text'])) {
                $analysis .= $contentItem['text'] . "\n";
            }
        }
    }
}

$analysis = trim($analysis);
if ($analysis === '') {
    $analysis = 'No clear AI result was returned. Please try another plant image.';
}

send_json(200, [
    'success' => true,
    'analysis' => $analysis
]);
?>
