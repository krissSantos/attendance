<?php
require_once 'attendee_status.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendee Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Attendee Details</h2>
        <?php if (!empty($attendee)): ?>
            <form method="post">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Attendance</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $attendee['attendees_ID'] ?></td>
                            <td><?= $attendee['first_name'] ?></td>
                            <td><?= $attendee['last_name'] ?></td>
                            <td><?= $attendee['email'] ?></td>
                            <td><?= $attendee['attended'] ?></td>
                            <td><?= $attendee['attendance_time'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <!-- Button to mark attendee as present -->
                <button type="submit" name="mark_present" class="btn btn-success" style="float:right">Mark as Present</button>
            </form>
        <?php else: ?>
            <p>Attendee not found.</p>
        <?php endif; ?>
    </div>
    <a href="index.php?action=show_all_attendees" class="btn btn-primary" style="margin-left: 120px">Back to Homepage</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>