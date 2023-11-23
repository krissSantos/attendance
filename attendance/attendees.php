<?php
require_once 'models/AttendeesModel.php';
require_once 'controllers/AttendeesController.php';
require_once 'config.php';



$attendeesModel = new AttendeesModel($db);
$attendeesController = new AttendeesController($attendeesModel);

$attendeesController->showAllAttendees();
?>
