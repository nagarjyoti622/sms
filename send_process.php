<?php
// Database connection ko include karein
require_once 'config.php'; 

if(isset($_POST['send'])){
    // Form se data lena
    $number = $_POST['number'];
    $message = $_POST['message'];

    /**
     * LOCAL GATEWAY CONFIGURATION
     * Yahan vahi IP aur Port dalein jo aapki Android App mein dikh raha hai.
     */
    $device_ip = "10.42.232.190"; // Aapki app ka IP
    $device_port = "8080";        // Aapki app ka Port
    
    // API URL banana
    $url = "http://$device_ip:$device_port/send?number=" . urlencode($number) . "&message=" . urlencode($message);

    // cURL initialize karna
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    // Request execute karna
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);

    // Status check karna aur Database mein save karna
    if ($err) {
        $status = "Failed (Connection Error)";
        echo "<h3 style='color:red;'>❌ Error: App se connection nahi ho paya!</h3>";
    } elseif ($http_code == 200) {
        $status = "Sent";
        echo "<h3 style='color:green;'>✅ Success: Message line mein lag gaya hai!</h3>";
    } else {
        $status = "Error (Code: $http_code)";
        echo "<h3 style='color:orange;'>⚠️ Warning: App ne respond kiya par error ke saath.</h3>";
    }

    // Database mein entry save karna (CRUD Operation)
    $stmt = $conn->prepare("INSERT INTO sent_messages (mobile_number, message_text, status) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $number, $message, $status);
    
    if($stmt->execute()){
        echo "<p>Record database mein save ho gaya hai.</p>";
    } else {
        echo "<p>Database Error: " . $conn->error . "</p>";
    }

    echo "<br><a href='index.php'>Wapas jayein</a>";
}
?>