<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $nickname = $_POST['nickname'];
    
    $url = 'https://circle.robi.com.bd/mylife/appapi/appcall.php?op=getUserInfobyNickname&nickname=' . urlencode($nickname);
    
    $headers = array(
        'x-api-key: f957932302d90b9e191df9df23a13746',
        'x-app-key: 000oc0so48owkw4s0wwo4c00g00804w80gwkw8kg',
        'User-Agent: gzip'
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close($ch);
    
    $data = json_decode($response, true)['data'];
    
    // Display the data in HTML
    echo '<h2>' . $data['name'] . '</h2>';
    echo '<p>MSISDN: ' . $data['msisdn'] . '</p>';
    echo '<p>Status ID: ' . $data['status_id'] . '</p>';
    echo '<p>Start Date: ' . $data['start_date'] . '</p>';
    echo '<p>End Date: ' . $data['end_date'] . '</p>';
    echo '<p>Rank: ' . $data['rank'] . '</p>';
    echo '<p>Gender: ' . $data['gender'] . '</p>';
    echo '<p>Birthday: ' . $data['birthday'] . '</p>';
    echo '<p>Language: ' . $data['language'] . '</p>';
    echo '<p>Package ID: ' . $data['package_id'] . '</p>';
    echo '<p>Agent: ' . $data['agent'] . '</p>';
    echo '<p>Type: ' . $data['type'] . '</p>';
    echo '<p>Points: ' . $data['points'] . '</p>';
    echo '<p>Followers: ' . $data['followers'] . '</p>';
    echo '<p>Following: ' . $data['following'] . '</p>';
    echo '<p>Friends: ' . $data['friends'] . '</p>';
    echo '<p>Updates: ' . $data['updates'] . '</p>';
    echo '<p>Comments: ' . $data['comments'] . '</p>';
    echo '<p>Timestamp: ' . $data['timestamp'] . '</p>';
    echo '<p>ML Status: ' . $data['mlstatus'] . '</p>';
    echo '<p>ML Status ID: ' . $data['mlstatus_id'] . '</p>';
} else {
    echo 'Please enter a nickname.';
}
