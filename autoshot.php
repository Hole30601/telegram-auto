<?php
// Lấy dữ liệu từ request
$filePath = $_POST['filePath']; // Đường dẫn tạm thời của ảnh trên server
$caption = $_POST['caption'];   // Caption của ảnh

// Token của bot (lưu trữ an toàn trên server)
$botToken = '8156879544:AAE_D02keTe8oXl3DvgNj_WrahvutQSRjow';
$chatID = '-1002478400955';

// URL API của Telegram
$url = "https://api.telegram.org/bot{$botToken}/sendPhoto";

// Tạo multipart/form-data request
$postData = [
    'chat_id' => $chatID,
    'caption' => $caption,
    'photo' => new CURLFile($filePath)
];

// Khởi tạo cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Gửi request và nhận phản hồi
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Lỗi cURL: ' . curl_error($ch);
} else {
    echo $response;
}

curl_close($ch);
?>
