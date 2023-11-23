<?php
require_once 'models/AttendeesModel.php';

class AttendeesController {
    private $model;

    public function __construct(AttendeesModel $model) {
        $this->model = $model;
    }

    public function showAllAttendees() {
        $totalPresentAttendees = $this->model->getTotalPresentAttendees();
        $attendees = $this->model->getAllAttendees();
        include 'views/homepage_view.php';
    }
    public function viewAttendee($attendeeId) {

        $attendee = $this->model->getAttendeeById($attendeeId);
        include 'views/attendee_details_view.php';
    }
    
}
?>
