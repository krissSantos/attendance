<?php
require_once 'models/AttendeesModel.php';

$dbHost = 'localhost';
$dbName = 'attendees';
$dbUser = 'root';
$dbPassword = '';

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}


$attendeesModel = new AttendeesModel($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['mark_present'])) {
        $attendeeId = $attendee['attendees_ID'];
        $attendeesModel->markAttendeePresent($attendeeId);
        header("Location: index.php?action=view_attendee&id=$attendeeId");
        exit();
    }
}
?>
