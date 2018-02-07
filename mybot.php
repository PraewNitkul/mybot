<?php
$access_token = 'VbLDGGZHAJ+ivF6l1I46NIJCVXBoJ9zV51Ar4W1uWRzvhop7/lslnT4/KIhrpWe2YjLJwnSsuV0dw2LZU+/hnYs4h6jv/H/7qh361giW2rz1p3nHcL8VgNdb2vhWzW8tSW32zv6sgBqfPBtGtdSbYgdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			if($text == 'hello'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'สวัสดีค่าาาา'
				];
			}
			else if($text == 'cpu'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'หน่วยประมวลผลกลาง ทำหน้าที่.....'
				];
			}
			else if($text == 'nitkul'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'คนของซิง'
				];
			}
			else if($text == 'ssing'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'น้องซุงซิง'
				];
			}
			else if($text == 'ss'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'support u'
				];
			}
			else if($text == 's'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'fight!!'
				];
			}
			else if($text == 'sss'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => '♥♥'
				];
			}
		
		
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}
	}
}
echo "OK";
?>
