document.getElementById('patientForm').addEventListener('submit', function(event) {
    let isValid = true;

    const patientName = document.getElementById('patientName');
    const patientNameError = document.getElementById('patientNameError');
    const patientNamePattern = /^[a-zA-Z\s'-]+$/;
    if (!patientNamePattern.test(patientName.value.trim())) {
        patientNameError.textContent = 'Invalid Patient Name';
        patientNameError.style.color = 'red';
        isValid = false;
    } else {
        patientNameError.textContent = '';
    }

    const patientContact = document.getElementById('patientContact');
    const patientContactError = document.getElementById('patientContactError');
    const patientContactPattern = /^\d+$/;
    if (!patientContactPattern.test(patientContact.value.trim())) {
        patientContactError.textContent = 'Invalid Contact Number';
        patientContactError.style.color = 'red';
        isValid = false;
    } else {
        patientContactError.textContent = '';
    }

    const admissionDate = document.getElementById('admissionDate');
    const admissionDateError = document.getElementById('admissionDateError');
    if (admissionDate.value.trim() === '') {
        admissionDateError.textContent = 'Admission Date is required';
        admissionDateError.style.color = 'red';
        isValid = false;
    } else {
        admissionDateError.textContent = '';
    }

    const doctor = document.getElementById('doctor');
    const doctorError = document.getElementById('doctorError');
    const doctorPattern = /^[a-zA-Z\s]+$/;
    if (!doctorPattern.test(doctor.value.trim())) {
        doctorError.textContent = 'Invalid Doctor Name';
        doctorError.style.color = 'red';
        isValid = false;
    } else {
        doctorError.textContent = '';
    }

    const department = document.getElementById('department');
    const departmentError = document.getElementById('departmentError');
    const departmentPattern = /^[a-zA-Z\s]+$/;
    if (!departmentPattern.test(department.value.trim())) {
        departmentError.textContent = 'Invalid Department Name';
        departmentError.style.color = 'red';
        isValid = false;
    } else {
        departmentError.textContent = '';
    }

    if (!isValid) {
        event.preventDefault();
    }
});