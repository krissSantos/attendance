<?php
require_once 'models/UserModel.php';

class LoginController {
    private $userModel;
    private $attendeesModel;

    public function __construct(UserModel $userModel, AttendeesModel $attendeesModel) {
        $this->userModel = $userModel;
        $this->attendeesModel = $attendeesModel;
    }

    public function showHomePage() {
        session_start();

        if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
            $attendees = $this->attendeesModel->getAllAttendees();
            include 'views/homepage_view.php';
            return;
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];


            $authenticated = $this->userModel->authenticateAdmin($username, $password);

            if ($authenticated) {
                $_SESSION['authenticated'] = true;
                header('Location: index.php?action=login');
                exit();
            } else {
                echo "Authentication failed. Invalid username or password.";
            }
        }

        include 'views/login_view.php';
    }
    public function logout() {
        session_start();
        session_destroy();
        $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php?action=login';
        header('Location: ' . $url);
        exit();
    }
}
?>
