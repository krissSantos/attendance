<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Welcome to the Homepage</h2>
        <?php if (!empty($attendees)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Attendance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($attendees as $attendee): ?>
                        <tr>
                            <td><?= $attendee['attendees_ID'] ?></td>
                            <td><?= $attendee['first_name'] ?></td>
                            <td><?= $attendee['last_name'] ?></td>
                            <td><?= $attendee['email'] ?></td>
                            <td><?= $attendee['attended'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p>Total Present Attendees: <?= $totalPresentAttendees ?></p>
        <?php else: ?>
            <p>No attendees to display.</p>
        <?php endif; ?>
    </div>
    <form action="index.php?action=logout" method="post">
            <input type="submit" value="Logout" style="margin-left: 120px"  class="btn btn-danger">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
