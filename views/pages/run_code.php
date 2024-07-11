<?php
// run_code.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];
    $language = (string) $_POST['language'];

    $clientId = 'bb3163d64db80aa87f149b51a3a7ec2a';
    $clientSecret = '99043e289eabc79837025889a1298b61cf60324a1a0846382e5551586ec918ef';
    // $clientId = 'YOUR_JDOODLE_CLIENT_ID';
    // $clientSecret = 'YOUR_JDOODLE_CLIENT_SECRET';
    $url = 'https://api.jdoodle.com/v1/execute';

    $versionIndex = '0'; // Default version index
    switch ($language) {
        case 'python3':
            $versionIndex = '3';
            break;
        case 'c':
            $versionIndex = '5';
            break;
        case 'cpp':
            $versionIndex = '5';
            break;
        case 'java':
            $versionIndex = '3';
            break;
        case 'php':
            $versionIndex = '4';
            break;
    }

    $data = [

        "clientId" => $clientId,
        "clientSecret" => $clientSecret,
        "script" => $code,
        "language" => $language,
        "versionIndex" => $versionIndex
    ];

    $options = [
        'http' => [
            'header'  => "Content-Type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data),
        ],
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    // file_get_contents()

    if ($result === FALSE) {
        die('Error');
    }

    echo '<pre>' . htmlspecialchars($result) . '</pre>';
}
?>
