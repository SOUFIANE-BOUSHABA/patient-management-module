<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Healthcare Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
  <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>

  <?php include 'sidebar.php'; ?>

  <div class="content">
    <div class="d-flex justify-content-between">
    <h2 class="fw-bold">
       <span>Healthcare</span> <br>  Management System</h2>
    <img src="./assets/img/image.png" alt="">
    </div>
  
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <input type="text" class="form-control mb-3" placeholder="Search here...">
            <table class="table table-bordered">
            <thead>
  <tr>
    <th>Name</th>
    <th>MOB</th>
    <th>Date</th>
    <th>Doctor</th>
    <th>Department</th>
    <th>Actions</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($patients as $patient): ?>
  <tr>
    <td><img src="<?= htmlspecialchars($patient['profile_picture']) ?>" alt="profile" style="width: 40px; height: 40px;"> <?= htmlspecialchars($patient['name']) ?></td>
    <td><?= htmlspecialchars($patient['contact_number']) ?></td>
    <td><?= htmlspecialchars(date('d/m/Y H:iA', strtotime($patient['admission_date']))) ?></td>
    <td><?= htmlspecialchars($patient['doctor']) ?></td>
    <td><?= htmlspecialchars($patient['department']) ?></td>
    <td class="d-flex text-center text-gray gap-4" >
      <a href="#" data-bs-toggle="modal" data-bs-target="#updatePatientModal<?= $patient['id'] ?>"><i class="bi bi-pen"></i></a>
      <a href="?uri=home/deletePatient/<?= $patient['id'] ?>"><i class="bi bi-trash3"></i></a>
    </td>
  </tr>

  <div class="modal fade" id="updatePatientModal<?= $patient['id'] ?>" tabindex="-1" aria-labelledby="updatePatientModalLabel<?= $patient['id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updatePatientModalLabel<?= $patient['id'] ?>">Update Patient</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="?uri=home/updatePatient/<?= $patient['id'] ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="existingProfilePicture" value="<?= htmlspecialchars($patient['profile_picture']) ?>">
            <div class="mb-3">
              <label for="patientName" class="form-label">Patient Name</label>
              <input type="text" class="form-control" name="patientName" id="patientName" value="<?= htmlspecialchars($patient['name']) ?>" required>
            </div>
            <div class="mb-3">
              <label for="patientContact" class="form-label">Contact Number</label>
              <input type="text" class="form-control" name="patientContact" id="patientContact" value="<?= htmlspecialchars($patient['contact_number']) ?>" required>
            </div>
            <div class="mb-3">
              <label for="admissionDate" class="form-label">Admission Date</label>
              <input type="date" class="form-control" name="admissionDate" id="admissionDate" value="<?= htmlspecialchars(date('Y-m-d', strtotime($patient['admission_date']))) ?>" required>
            </div>
            <div class="mb-3">
              <label for="doctor" class="form-label">Doctor</label>
              <input type="text" class="form-control" name="doctor" id="doctor" value="<?= htmlspecialchars($patient['doctor']) ?>" required>
            </div>
            <div class="mb-3">
              <label for="department" class="form-label">Department</label>
              <input type="text" class="form-control" name="department" id="department" value="<?= htmlspecialchars($patient['department']) ?>" required>
            </div>
            <div class="mb-3">
              <label for="profilePicture" class="form-label">Profile Picture</label>
              <input type="file" class="form-control" name="profilePicture" id="profilePicture">
            </div>
            <button type="submit" class="btn btn-primary">Update Patient</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php endforeach; ?>
</tbody>

            </table>
          </div>
        </div>
        <div class="container my-5">
        <div class="row g-4 text-center">
        <div class="col-md-4 ">
            <div class="card card-custom bg-lightblue " data-bs-toggle="modal" data-bs-target="#admitPatientModal">
                <div class="card-body d-flex gap-4">
                <img src="https://via.placeholder.com/60" alt="Admit New Patient">
                <div>
                    <h5 class="card-title mt-3">ADMIT NEW</h5>
                    <h4 class="card-subtitle mb-2 text-primary">PATIENT</h4>
                </div>
                </div>
            </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom bg-lightblue">
                    <div class="card-body d-flex gap-4">
                        <img src="https://via.placeholder.com/60" alt="Emergency Room">
                      <div>
                      <h5 class="card-title mt-3">EMERGENCY</h5>
                      <h4 class="card-subtitle mb-2 text-primary">ROOM</h4>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom bg-lightgreen">
                    <div class="card-body d-flex gap-4">
                        <img src="https://via.placeholder.com/60" alt="Pharmacy Details">
                        <div>
                        <h5 class="card-title mt-3">PHARMACY</h5>
                        <h4 class="card-subtitle mb-2 text-primary">DETAILS</h4>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div>

      <div class="col-md-4">
      <div class="stats">
  <div class="card text-center">
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-center">
        <div class="left">
          <img src="./assets/img/icon.png" alt="Appointments">
        </div>
        <div class="right ms-2">
          <h3 class="card-title">140</h3>
          <p class="card-text">Total Appointments</p>
        </div>
      </div>
    </div>
  </div>
  <div class="card text-center">
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-center">
        <div class="left">
          <img src="./assets/img/icon.png" alt="Patients">
        </div>
        <div class="right ms-2">
          <h3 class="card-title">370</h3>
          <p class="card-text">Total Patients</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="stats">
  <div class="card text-center">
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-center">
        <div class="left">
          <img src="./assets/img/icon.png" alt="Cancellations">
        </div>
        <div class="right ms-2">
          <h3 class="card-title">70</h3>
          <p class="card-text">Total Cancellations</p>
        </div>
      </div>
    </div>
  </div>
  <div class="card text-center">
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-center">
        <div class="left">
          <img src="./assets/img/icon.png" alt="Avg per Doctor">
        </div>
        <div class="right ms-2">
          <h3 class="card-title">120</h3>
          <p class="card-text">Total Avg per Doctor</p>
        </div>
      </div>
    </div>
  </div>
</div>

        <div class="available-doctors card p-4">
          <h5 class="fw-bold mb-2" >Available Doctors</h5>
          <input type="text" class="form-control mb-3" placeholder="Search here...">
          <div class="d-flex flex-wrap">
            <div class="  mb-3 text-center ">
              <img src="https://via.placeholder.com/60" alt="doctor">
              <div class="card-body">
                <p class="doctor-name">Dr. Jennifer Roberts</p>
                <p>Pediatrics (A-9987)</p>
              </div>
            </div>
            <div class=" mb-3 text-center ">
              <img src="https://via.placeholder.com/60" alt="doctor">
              <div class="card-body">
                <p class="doctor-name">Dr. Michael Sullivan</p>
                <p>Cardiology (A-9645)</p>
              </div>
            </div>
            <div class="  mb-3 text-center">
              <img src="https://via.placeholder.com/60" alt="doctor">
              <div class="card-body">
                <p class="doctor-name">Dr. Jennifer Roberts</p>
                <p>Pediatrics (A-9987)</p>
              </div>
            </div>
            <div class="  mb-3 text-center">
              <img src="https://via.placeholder.com/60" alt="doctor">
              <div class="card-body">
                <p class="doctor-name">Dr. Michael Sullivan</p>
                <p>Cardiology (A-9645)</p>
              </div>
            </div>
            <div class="  mb-3 text-center">
              <img src="https://via.placeholder.com/60" alt="doctor">
              <div class="card-body">
                <p class="doctor-name">Dr. Jennifer Roberts</p>
                <p>Pediatrics (A-9987)</p>
              </div>
            </div>
            <div class="  mb-3 text-center">
              <img src="https://via.placeholder.com/60" alt="doctor">
              <div class="card-body">
                <p class="doctor-name">Dr. Michael Sullivan</p>
                <p>Cardiology (A-9645)</p>
              </div>
            </div>
            <div class="  mb-3 text-center">
              <img src="https://via.placeholder.com/60" alt="doctor">
              <div class="card-body">
                <p class="doctor-name">Dr. Jennifer Roberts</p>
                <p>Pediatrics (A-9987)</p>
              </div>
            </div>
            <div class="  mb-3 text-center">
              <img src="https://via.placeholder.com/60" alt="doctor">
              <div class="card-body">
                <p class="doctor-name">Dr. Michael Sullivan</p>
                <p>Cardiology (A-9645)</p>
              </div>
            </div>
            <div class="  mb-3 text-center">
              <img src="https://via.placeholder.com/60" alt="doctor">
              <div class="card-body">
                <p class="doctor-name">Dr. Michael Sullivan</p>
                <p>Cardiology (A-9645)</p>
              </div>
            </div>
           
          
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="modal fade" id="admitPatientModal" tabindex="-1" aria-labelledby="admitPatientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="admitPatientModalLabel">Admit New Patient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="patientForm" action="?uri=home/addPatient" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="patientName" class="form-label">Patient Name</label>
        <input type="text" class="form-control" name="patientName" id="patientName" required>
        <div class="error-message" id="patientNameError"></div>
    </div>
    <div class="mb-3">
        <label for="patientContact" class="form-label">Contact Number</label>
        <input type="text" class="form-control" name="patientContact" id="patientContact" required>
        <div class="error-message" id="patientContactError"></div>
    </div>
    <div class="mb-3">
        <label for="admissionDate" class="form-label">Admission Date</label>
        <input type="date" class="form-control" name="admissionDate" id="admissionDate" required>
        <div class="error-message" id="admissionDateError"></div>
    </div>
    <div class="mb-3">
        <label for="doctor" class="form-label">Doctor</label>
        <input type="text" class="form-control" name="doctor" id="doctor" required>
        <div class="error-message" id="doctorError"></div>
    </div>
    <div class="mb-3">
        <label for="department" class="form-label">Department</label>
        <input type="text" class="form-control" name="department" id="department" required>
        <div class="error-message" id="departmentError"></div>
    </div>
    <div class="mb-3">
        <label for="profilePicture" class="form-label">Profile Picture</label>
        <input type="file" class="form-control" name="profilePicture" id="profilePicture" required>
        <div class="error-message" id="profilePictureError"></div>
    </div>
    <button type="submit" class="btn btn-primary">Admit Patient</button>
</form>
      </div>
    </div>
  </div>
</div>

<script src="./assets/js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
