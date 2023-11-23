<?php
require_once 'config.php';

class AttendeesModel {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAllAttendees() {
        $sql = "SELECT * FROM attendees";
        $query = $this->db->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAttendeeById($attendeeId) {
        $sql = "SELECT * FROM attendees WHERE attendees_ID = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $attendeeId);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function markAttendeePresent($attendeeId) {
        try {
            $sql = "UPDATE attendees SET attended = 1, attendance_time = NOW() WHERE attendees_ID = :id";
            $query = $this->db->prepare($sql);
            $query->bindParam(':id', $attendeeId, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            echo "Error updating attendance: " . $e->getMessage();
        }
    }
    public function getTotalPresentAttendees() {
        try {
            $sql = "SELECT COUNT(*) FROM attendees WHERE attended = 1";
            $query = $this->db->query($sql);
            return $query->fetchColumn();
        } catch (PDOException $e) {
            echo "Error getting total present attendees: " . $e->getMessage();
            return false;
        }
    }
    
    
}