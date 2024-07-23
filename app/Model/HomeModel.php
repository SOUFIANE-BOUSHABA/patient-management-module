<?php

namespace App\Model;

use PDO;
use PDOException;
use App\Database\Database;

class HomeModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function insertPatient($name, $contact, $admissionDate, $doctor, $department, $profilePicture) {
        try {
            $sql = "INSERT INTO patients (name, contact_number, admission_date, doctor, department, profile_picture) VALUES (:name, :contact, :admissionDate, :doctor, :department, :profilePicture)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':contact', $contact);
            $stmt->bindParam(':admissionDate', $admissionDate);
            $stmt->bindParam(':doctor', $doctor);
            $stmt->bindParam(':department', $department);
            $stmt->bindParam(':profilePicture', $profilePicture);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getAllPatients() {
        try {
            $sql = "SELECT * FROM patients";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }



public function getPatientById($id) {
  try {
      $sql = "SELECT * FROM patients WHERE id = :id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      return false;
  }
}

public function updatePatient($id, $name, $contact, $admissionDate, $doctor, $department, $profilePicture) {
  try {
      $sql = "UPDATE patients SET name = :name, contact_number = :contact, admission_date = :admissionDate, doctor = :doctor, department = :department, profile_picture = :profilePicture WHERE id = :id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':contact', $contact);
      $stmt->bindParam(':admissionDate', $admissionDate);
      $stmt->bindParam(':doctor', $doctor);
      $stmt->bindParam(':department', $department);
      $stmt->bindParam(':profilePicture', $profilePicture);
      $stmt->execute();
      return true;
  } catch (PDOException $e) {
      return false;
  }
}

public function deletePatient($id) {
  try {
      $sql = "DELETE FROM patients WHERE id = :id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      return true;
  } catch (PDOException $e) {
      return false;
  }
}
}

?>
