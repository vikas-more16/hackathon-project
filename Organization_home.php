<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Organization Dashboard</title>
  <link rel="stylesheet" href="Organization_home.css">
  <script>
    // Function to open the classroom form
    function openClassForm() {
      document.getElementById("classPopup").style.display = "block";
    }

    // Function to close the classroom form
    function closeClassForm() {
      document.getElementById("classPopup").style.display = "none";
    }

    // Function to add a classroom
    function addClassroom() {
      let className = document.getElementById("className").value;
      let studentCount = document.getElementById("studentCount").value;
      let teacherName = document.getElementById("teacherName").value;
      let subject = document.getElementById("subject").value;
      let studentNames = [];
      let rollNumbers = [];

      if (className && studentCount && teacherName && subject) {
        // Collect student names and roll numbers
        for (let i = 0; i < studentCount; i++) {
          let studentName = document.getElementById("studentName" + i).value;
          let rollNumber = document.getElementById("rollNumber" + i).value;
          studentNames.push(studentName);
          rollNumbers.push(rollNumber);
        }

        // Store classroom data in localStorage
        const classroomData = {
          className: className,
          teacherName: teacherName,
          subject: subject,
          students: studentNames,
          rollNumbers: rollNumbers,
        };
        
        let classrooms = JSON.parse(localStorage.getItem("classrooms")) || [];
        classrooms.push(classroomData);
        localStorage.setItem("classrooms", JSON.stringify(classrooms));

        // Display classroom card
        displayClassroom(classroomData);

        closeClassForm();
      } else {
        alert("Please fill in all fields.");
      }
    }

    // Function to display classroom card with student names
    function displayClassroom(classroomData) {
      let newCard = document.createElement("div");
      newCard.classList.add("class-card");
      newCard.innerHTML = `
        <h4>${classroomData.className}</h4>
        <p><b>Teacher:</b> ${classroomData.teacherName}</p>
        <p><b>Subject:</b> ${classroomData.subject}</p>
        <p><b>Students:</b> ${classroomData.students.length}</p> <!-- Display student count -->
        <button onclick="viewClassroom('${classroomData.className}')">View Classroom</button>
        <button onclick="deleteClassroom('${classroomData.className}')">Delete Classroom</button>
      `;
      document.getElementById("classesSection").appendChild(newCard);
    }

    // Function to view the students of a particular class
    function viewClassroom(className) {
      // Get classroom data from localStorage
      let classrooms = JSON.parse(localStorage.getItem("classrooms")) || [];
      let classroom = classrooms.find(classroom => classroom.className === className);

      if (classroom) {
        let studentDetailsSection = document.getElementById("studentDetails");
        studentDetailsSection.innerHTML = `<h3>Students of ${className}</h3>`;

        // Create a list of students with their roll numbers
        let studentList = document.createElement("ul");
        classroom.students.forEach((student, index) => {
          let studentItem = document.createElement("li");
          studentItem.innerHTML = `${student} (Roll No: ${classroom.rollNumbers[index]})`;
          studentList.appendChild(studentItem);
        });

        studentDetailsSection.appendChild(studentList);
      }
    }

    // Function to delete a classroom
    function deleteClassroom(className) {
      let classrooms = JSON.parse(localStorage.getItem("classrooms")) || [];
      classrooms = classrooms.filter(classroom => classroom.className !== className);
      localStorage.setItem("classrooms", JSON.stringify(classrooms));

      // Reload the classrooms to reflect the change
      document.getElementById("classesSection").innerHTML = '';
      loadClassrooms();
    }

    // Function to load classroom data when the page loads
    function loadClassrooms() {
      let classrooms = JSON.parse(localStorage.getItem("classrooms")) || [];
      classrooms.forEach(classroom => {
        displayClassroom(classroom);
      });
    }

    // Call the loadClassrooms function when the page loads
    window.onload = loadClassrooms;
  </script>
</head>
<body>
  <div class="container">
    <div class="header">
      <div>Organization Dashboard</div>
      <div class="logout">&#10148; <a href="index.php">Logout</a></div>
    </div>

    <div class="dashboard-section">
      <div class="card">
        <h3>Classrooms</h3>
        <button class="button" onclick="openClassForm()">+ Create Classroom</button>
      </div>
      <div class="card">
        <h3>Content Management</h3>
        <button class="button" onclick="window.location.href='studenthomework.html'">+ Add Content</button>
      </div>
    </div>

    <div class="dashboard-section">
      <h2>Classes</h2>
      <div id="classesSection" class="classes-container">
        <!-- New class cards will appear here -->
      </div>
    </div>

    <div id="studentDetails" class="student-details">
      <!-- This section will display the student names and roll numbers -->
    </div>
  </div>

  <!-- Create Classroom Popup Form -->
  <div id="classPopup" class="popup">
    <div class="popup-content">
      <h2>Create a Classroom</h2>
      <label>Class Name:</label>
      <input type="text" id="className" placeholder="Enter Class Name">

      <label>Number of Students:</label>
      <input type="number" id="studentCount" placeholder="Enter No. of Students" oninput="generateStudentFields()">

      <div id="studentFields"></div> <!-- This will hold student name and roll number fields -->

      <label>Teacher Name:</label>
      <input type="text" id="teacherName" placeholder="Enter Teacher Name">

      <label>Subject:</label>
      <input type="text" id="subject" placeholder="Enter Subject Name">

      <button onclick="addClassroom()">Add Classroom</button>
      <button onclick="closeClassForm()">Cancel</button>
    </div>
  </div>

  <style>
    /* Style for container, cards, etc. (same as before) */
    .container { padding: 20px; }
    .header {
      display: flex; justify-content: space-between; background: #4CAF50;
      color: white; padding: 15px; font-size: 20px;
    }
    .logout a { color: white; text-decoration: none; }
    .dashboard-section { display: flex; justify-content: space-between; margin: 20px 0; }
    .card {
      background: white; padding: 20px; width: 45%;
      border-radius: 10px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    }
    .button { background: #008CBA; color: white; padding: 10px; border-radius: 5px; cursor: pointer; }
    .button:hover { background: #005f73; }
    .classes-container { display: flex; flex-wrap: wrap; gap: 15px; }
    .class-card {
      background: lightblue; padding: 10px; width: 200px; border-radius: 10px;
      text-align: center; font-size: 16px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }

    /* Popup Form Styles */
    .popup { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; }
    .popup-content { background: white; padding: 20px; border-radius: 10px; text-align: center; width: 300px; }
    .popup-content input { width: 100%; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #ccc; }
    .popup-content button { background: #4CAF50; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; width: 100%; margin-top: 10px; }
    .popup-content button:hover { background: #45a049; }

    /* Styles for Student Details Section */
    .student-details { margin-top: 20px; padding: 20px; background: #f9f9f9; border-radius: 10px; }
    .student-details h3 { margin-bottom: 15px; }
    .student-details ul { list-style-type: none; padding: 0; }
    .student-details ul li { margin-bottom: 10px; font-size: 16px; }
  </style>

  <script>
    // Generate student name and roll number fields dynamically
    function generateStudentFields() {
      let studentCount = document.getElementById("studentCount").value;
      let studentFieldsContainer = document.getElementById("studentFields");
      studentFieldsContainer.innerHTML = ''; // Clear existing fields

      for (let i = 0; i < studentCount; i++) {
        studentFieldsContainer.innerHTML += `
          <label>Student ${i + 1} Name:</label>
          <input type="text" id="studentName${i}" placeholder="Enter Student ${i + 1} Name">

          <label>Roll Number:</label>
          <input type="text" id="rollNumber${i}" placeholder="Enter Roll Number">
        `;
      }
    }
  </script>
</body>
</html>
