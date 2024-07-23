<?php

namespace App\Controller;

use App\Model\HomeModel;

class HomeController {

    public function index() {
        $homeModel = new HomeModel();
        $patients = $homeModel->getAllPatients();
        include_once '../app/View/home.php';
    }

    public function addPatient() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['patientName'];
            $contact = $_POST['patientContact'];
            $admissionDate = $_POST['admissionDate'];
            $doctor = $_POST['doctor'];
            $department = $_POST['department'];

            $profilePicture = null;
            if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] == UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                $uploadFile = $uploadDir . basename($_FILES['profilePicture']['name']);
                if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $uploadFile)) {
                    $profilePicture = $uploadFile;
                }
            }

            $homeModel = new HomeModel();
            $result = $homeModel->insertPatient($name, $contact, $admissionDate, $doctor, $department, $profilePicture);

            if ($result) {
                $this->index();
            } else {
                $this->index();
            }
        }
        else{
          $this->index();
        }
    }


    public function updatePatient($id) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $name = $_POST['patientName'];
          $contact = $_POST['patientContact'];
          $admissionDate = $_POST['admissionDate'];
          $doctor = $_POST['doctor'];
          $department = $_POST['department'];
  
          $profilePicture = $_POST['existingProfilePicture'];
          if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] == UPLOAD_ERR_OK) {
              $uploadDir = 'uploads/';
              $uploadFile = $uploadDir . basename($_FILES['profilePicture']['name']);
              if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $uploadFile)) {
                  $profilePicture = $uploadFile;
              }
          }
  
          $homeModel = new HomeModel();
          $result = $homeModel->updatePatient($id, $name, $contact, $admissionDate, $doctor, $department, $profilePicture);
  
          if ($result) {
              header('Location: ?uri=home/index');
          } else {
              echo "Error updating patient";
          }
      }
  }
  
  public function deletePatient($id) {
      $homeModel = new HomeModel();
      $result = $homeModel->deletePatient($id);
      if ($result) {
          header('Location: ?uri=home/index');
      } else {
          echo "Error deleting patient";
      }
  }

  
}

?>
