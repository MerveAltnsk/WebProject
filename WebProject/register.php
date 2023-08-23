<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }

        .logo {
            text-align: center;
            margin-bottom: auto;
        }

        .logo img {
            width: 200px;
        }

        .registered-students {
            max-width: 680px;
            margin: 0 auto;
            padding: 40px;
            background-color: #f5f5f5;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }

        .registered-students h1 {
            margin-bottom: 30px;
            color: #333;
        }

        .registered-students p {
            margin-bottom: 10px;
            color: #777;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-group .password-toggle {
            margin-left: 5px;
            cursor: pointer;
        }

        .error-message {
            margin-bottom: 10px;
            color: red;
            font-style: italic;
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: #fff;
            font-weight: bold;
            border-radius: 3px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }
        #studentImage{
            width:150px;

        }

        .course-selection {
        margin-bottom: 20px;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 4px;
        background-color: #f5f5f5;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .course-selection h3 {
            margin-top: 0;
            color: #333;
        }

        .selected-courses {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
            background-color: #f5f5f5;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .selected-courses h3 {
            margin-top: 0;
            color: #333;
        }

        .selected-courses ul {
            padding-left: 20px;
            margin: 0;
        }

        .selected-courses li {
            list-style-type: none;
            margin-bottom: 5px;
        }

        .selected-courses li button {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .selected-courses li button:hover {
            background-color: #45a049;
        }

        .comment-section {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
            background-color: #f5f5f5;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .comment-section h3 {
            margin-top: 0;
            color: #333;
        }

        .error-message {
            color: #4CAF50;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .bordermain {
            width: 800px;
            margin: 0 auto;
            padding: 55px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 10px;
        }
        .h1 {
            text-align: center;        
        }
        .nav{
            background: #f5f5f5;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav i {
            font-size: 25px;
            padding: 10px 20px;
            color: #31398E;
            border: none;
            cursor: pointer;
        }


    </style>
</head>
<body>
    <div class = "bordermain">
        <nav class="nav">
        <button class="logout-btn"><i class='bx bx-log-out'>Log out</i></button>
        </nav>
            <br/>
            <div class="logo">
                <img src="logo.png" alt="Logo">
            </div>
            <div class="h1">
                <h1>European University of Lefke</h1>
            </div>
            <br/>
        <div class="registered-students">
            <img id="studentImage" src="student.png" alt="student.png" class="profile-image">

            <h1>Logged Students</h1>
            <?php
            if (isset($_POST['user']) && isset($_POST['password'])) {
                // Get the username and password
                $userName = $_POST["user"];
                $password = $_POST["password"];

                // Process XML data
                $xmlData = simplexml_load_file("student.xml");

                $isValid = false;
                foreach ($xmlData->Student as $student) {
                    $name = $student->Name;
                    $studentNo = $student->StudentNo;

                    if (strcasecmp($userName, (string)$name) === 0 && strcasecmp($password, (string)$studentNo) === 0) {
                        $isValid = true;
                        break;
                    }
                }

                /*if ($isValid) {
                    echo "<p>User Name: $userName</p>";
                    echo "<p>Password: $password</p>";
                } else {
                    echo "<p>Invalid username or password</p>";
                }*/
            }
            ?>




            <table>
                <tr>
                    <th>Student No</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Program</th>
                    <th>GPA</th>
                    <th>Semester</th>
                </tr>
                <?php
                // Re-process XML data
                $xmlData = simplexml_load_file("student.xml");

                foreach ($xmlData->Student as $student) {
                    $studentNo = $student->StudentNo;
                    $name = $student->Name;
                    $surname = $student->Surname;
                    $program = $student->Program;
                    $semesterGrade = 3.0;
                    $semester = "2023-2024 Spring";

                    if ($name == $userName && $studentNo == $password) {
                        echo "<tr>";
                        echo "<td>$studentNo</td>";
                        echo "<td>$name</td>";
                        echo "<td>$surname</td>";
                        echo "<td>$program</td>";
                        echo "<td>$semesterGrade</td>";
                        echo "<td>$semester</td>";
                        echo "</tr>";
                        
                    }
                }
                ?>
            </table>

        
            
        </div>
        <br>
        <div class="course-selection">
            <label for="courses">Select a course:</label>
            <select name="courses" id="courses">
                <option value="course1">MIS303-CP213 MANAGEMENT INFORMATION SYSTEMS</option>
                <option value="course2">EE431-COMPXX5-EEXX5 PRINCIPLES OF DIGITAL IMAGE PROCESSING</option>
                <option value="course3">COMP452 GRADUATION PROJECT II</option>
                <option value="course4">ENGG434 ENGINEERING ETHICS</option>
                <option value="course5">COMP448 ARTIFICIAL NEURAL NETWORKS</option>
                <option value="course6">COMP464 INTERNET PROGRAMMING</option>
                <option value="course7">BUSN411 STRATEGIC PALNNING AND MANAGEMENT </option>
                <option value="course8">COMP465 ADVANCED COMPUTER GRAPHICS	</option>
                <option value="course9">ECON413 ENGINERRING ECONOMY	</option>
                <option value="course10">SENG407 SOFTWARE PROJECT MANAGEMENT </option>
            </select>
            <button onclick="addCourse()">Add Course</button>
            <p id="error-message" class="error-message"></p>
        </div>

        <div class="selected-courses">
                <h3>Selected Courses:</h3>
                <ul id="selected-courses-list"></ul>

            </div>

    <!--
    <div class="comment-section">
        <label for="comment">Add a comment:</label><br>
        <textarea name="comment" id="comment" rows="4" cols="50"></textarea>
    </div>
    -->
    <div class = "border">
                    <div class="comment-section">
                    <h2> Comment Section </h2>
                        <form id="commentForm">
                            <textarea name="comment" placeholder="Write your comment here"></textarea>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
    </div>




<script>
    var selectedCourses = [];

    function addCourse() {
        var selectElement = document.getElementById("courses");
        var selectedCourse = selectElement.options[selectElement.selectedIndex].text;
        var selectedCoursesList = document.getElementById("selected-courses-list");

        if (selectedCourses.length >= 5) {
            alert("Maximum 5 courses can be selected.");
            return;
        }

        if (selectedCourses.includes(selectedCourse)) {
            alert("Course is already selected.");
            return;
        }


        selectedCourses.push(selectedCourse);
        var newCourseItem = document.createElement("li");
        newCourseItem.textContent = selectedCourse;

        var deleteButton = document.createElement("button");
        deleteButton.textContent = "Delete";
        deleteButton.addEventListener("click", function () {
            selectedCourses.splice(selectedCourses.indexOf(selectedCourse), 1);
            selectedCoursesList.removeChild(newCourseItem);
            errorMessage.textContent = "";
        });

        newCourseItem.appendChild(deleteButton);
        selectedCoursesList.appendChild(newCourseItem);
        errorMessage.textContent = "";

    }
   
    var commentForm = document.getElementById("commentForm");
        commentForm.addEventListener("submit", function(event) {
            event.preventDefault();
            var commentTextarea = commentForm.querySelector("textarea");
            var comment = commentTextarea.value.trim();

            if (comment !== "") {
                var email = "mervealtinisik99@gmail.com";
                var subject = "New Comment";
                var body = "A new comment has been submitted:\n\n" + comment;

                // Construct the mailto URL
                var mailtoURL = "mailto:" + email + "?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);

                // Open the default email client with the mailto URL
                window.location.href = mailtoURL;

                // Reset the comment textarea
                commentTextarea.value = "";
            }
        });
        
        document.addEventListener('DOMContentLoaded', function() {
        // Log out butonunu seç
        var logoutBtn = document.querySelector('.logout-btn');

        // Log out butonuna tıklandığında
        logoutBtn.addEventListener('click', function() {
            // Çıkış işlemlerini yapmak için gereken kodları buraya yazabilirsiniz
            // Örneğin, gerekli çıkış işlemlerini tamamlayın ve ardından login HTML sayfasına yönlendirin

            // Login sayfasına yönlendirme
            window.location.href = 'login.html';
        });
});
</script>
</body>
</html>
