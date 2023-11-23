<?php
require_once 'models/UserModel.php';
require_once 'models/AttendeesModel.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/AttendeesController.php';
require_once 'config.php';

$userModel = new UserModel($db);
$attendeesModel = new AttendeesModel($db);
$loginController = new LoginController($userModel, $attendeesModel);

$attendeesController = new AttendeesController($attendeesModel);

$action = isset($_GET['action']) ? $_GET['action'] : 'show_login';

switch ($action) {
    case 'login':
        $loginController->showHomePage();
        break;
    case 'logout':
        $loginController->logout();
        break;
    case 'show_all_attendees':
        $attendeesController->showAllAttendees();
        break;
    case 'view_attendee':
        $attendeeId = isset($_GET['id']) ? $_GET['id'] : null;
        $attendeesController->viewAttendee($attendeeId);
        break;
    default:
        include 'views/login_view.php';
        break;
}
?>
