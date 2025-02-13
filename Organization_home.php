<!DOCTYPE html>
<?php
session_start(); // Start session
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization Dashboard</title>
    <link rel="stylesheet" href="Organization_home.css">
    <script>
        function openClassForm() {
            document.getElementById("classPopup").style.display = "block";
        }

        function closeClassForm() {
            document.getElementById("classPopup").style.display = "none";
        }

        function openContentForm() {
            document.getElementById("contentPopup").style.display = "block";
        }

        function closeContentForm() {
            document.getElementById("contentPopup").style.display = "none";
        }

        function addClassroom() {
            let className = document.getElementById("className").value;
            let studentCount = document.getElementById("studentCount").value;
            let teacherName = document.getElementById("teacherName").value;
            let subject = document.getElementById("subject").value;

            if (className && studentCount && teacherName && subject) {
                let newCard = document.createElement("div");
                newCard.classList.add("class-card");
                newCard.innerHTML = `
                    <h4>${className}</h4>
                    <p><b>Students:</b> ${studentCount}</p>
                    <p><b>Teacher:</b> ${teacherName}</p>
                    <p><b>Subject:</b> ${subject}</p>
                    <button onclick="window.location.href='virtualClass.html'">Go to Page</button>

                `;

                document.getElementById("classesSection").appendChild(newCard);
                closeClassForm();
            } else {
                alert("Please fill in all fields.");
            }
        }

        function addContent() {
            let selectedClass = document.getElementById("selectClass").value;
            let teacherName = document.getElementById("contentTeacherName").value;
            let contentType = document.getElementById("contentType").value;
            let description = document.getElementById("contentDescription").value;
            let file = document.getElementById("contentFile").value;

            if (selectedClass && teacherName && contentType && description && file) {
                let newContentCard = document.createElement("div");
                newContentCard.classList.add("content-card");
                newContentCard.innerHTML = `
                    <h4>Class: ${selectedClass}</h4>
                    <p><b>Teacher:</b> ${teacherName}</p>
                    <p><b>Type:</b> ${contentType}</p>
                    <p><b>Description:</b> ${description}</p>
                    <p><b>File:</b> ${file.split("\\").pop()}</p>
                `;

                document.getElementById("contentSection").appendChild(newContentCard);
                closeContentForm();
            } else {
                alert("Please fill in all fields.");
            }
        }
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
                <button class="button" onclick="window.location.href='create_classroom.html'">+ Create Classroom</button>
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
    </div>

    <!-- Create Classroom Popup Form -->
    <div id="classPopup" class="popup">
        <div class="popup-content">
            <h2>Create a Classroom</h2>
            <label>Class Name:</label>
            <input type="text" id="className" placeholder="Enter Class Name">

            <label>Number of Students:</label>
            <input type="number" id="studentCount" placeholder="Enter No. of Students">

            <label>Teacher Name:</label>
            <input type="text" id="teacherName" placeholder="Enter Teacher Name">

            <label>Subject:</label>
            <input type="text" id="subject" placeholder="Enter Subject Name">

            <button onclick="addClassroom()">Add Classroom</button>
            <button onclick="closeClassForm()">Cancel</button>
        </div>
    </div>

    <!-- Add Content Popup Form -->
    <div id="contentPopup" class="popup">
        <div class="popup-content">
            <h2>Add Content</h2>
            <label>Select Class:</label>
            <select id="selectClass">
                <option value="">Choose a Class</option>
                <option value="Class 1">Class 1</option>
                <option value="Class 2">Class 2</option>
                <option value="Class 3">Class 3</option>
            </select>

            <label>Teacher Name:</label>
            <input type="text" id="contentTeacherName" placeholder="Enter Teacher Name">

            <label>Type of Content:</label>
            <select id="contentType">
                <option value="PDF">PDF</option>
                <option value="Video">Video</option>
                <option value="Quiz">Quiz</option>
            </select>

            <label>Description:</label>
            <textarea id="contentDescription" placeholder="Enter Description"></textarea>

            <label>Upload File:</label>
            <input type="file" id="contentFile">

            <button onclick="addContent()">Add Content to Class</button>
            <button onclick="closeContentForm()">Cancel</button>
        </div>
    </div>
    <style>
        .container {
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            background: #4CAF50;
            color: white;
            padding: 15px;
            font-size: 20px;
        }
        .logout a {
            color: white;
            text-decoration: none;
        }
        .dashboard-section {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }
        .card {
            background: white;
            padding: 20px;
            width: 45%;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }
        .button {
            background: #008CBA;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin-top: 10px;
        }
        .button:hover {
            background: #005f73;
        }
        .classes-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .class-card {
            background: lightblue;
            padding: 10px;
            width: 200px;
            border-radius: 10px;
            text-align: center;
            font-size: 16px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Popup Form */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 300px;
        }
        .popup-content input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .popup-content button {
            background: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        .popup-content button:hover {
            background: #45a049;
        }
    </style>
    <style>
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
        .classes-container, .content-container { display: flex; flex-wrap: wrap; gap: 15px; }
        .class-card, .content-card {
            background: lightblue; padding: 10px; width: 200px; border-radius: 10px;
            text-align: center; font-size: 16px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }
        .popup { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; }
        .popup-content { background: white; padding: 20px; border-radius: 10px; text-align: center; width: 300px; }
    </style>
</body>
</html>
