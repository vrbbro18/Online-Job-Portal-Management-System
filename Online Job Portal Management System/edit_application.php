<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php include_once('inc/header.php') ?>

<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}

// Retrieve the job details based on the job_id parameter in the URL
if (isset($_GET['id'])) {
    $job_id = $_GET['id'];
    $query = "SELECT * FROM job_list WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $job_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $job = $result->fetch_assoc();
    } else {
        // If the job is not found, you can handle the error or redirect to an error page
        echo "Job not found!";
        exit();
    }

    $stmt->close();
} else {
    // If the job_id parameter is not provided, you can handle the error or redirect to an error page
    echo "Invalid job ID!";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $highestDegree = $_POST["highest_degree"];
    $contactNumber = $_POST["contact_number"];
    $workingExperience = $_POST["working_experience"];
    $skills = $_POST["skills"];
    $workingHours = $_POST["working_hours"];
    $gender = $_POST["gender"];
    $contract = $_POST["contract"];
    $job_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("UPDATE job_applications SET name = ?, email = ?, highest_degree = ?, contact_number = ?, working_experience = ?, skills = ?, working_hours = ?, gender = ?, contract = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("sssssssssss", $name, $email, $highestDegree, $contactNumber, $workingExperience, $skills, $workingHours, $gender, $contract, $job_id, $user_id);

    // Execute the statement
    if ($stmt->execute()) {
        header('Location: my_application.php');
    } else {
        echo "<div id='alertBox' class='alert error'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            <strong>Error!</strong> Failed to update data.
        </div>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

// Fetch the job application details for the user
$user_id = $_SESSION['user_id'];
$job_id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM job_applications WHERE id = ? AND user_id = ?");
$stmt->bind_param("ss", $job_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // Retrieve the existing data for the job application
    $name = $row['name'];
    $email = $row['email'];
    $highestDegree = $row['highest_degree'];
    $contactNumber = $row['contact_number'];
    $workingExperience = $row['working_experience'];
    $skills = $row['skills'];
    $workingHours = $row['working_hours'];
    $gender = $row['gender'];
    $contract = $row['contract'];
} else {
    // Redirect to error page or display an error message
    header('Location: error.php');
    exit();
}
?>

<div class="container">
    <link rel="stylesheet" href="./style/add_application.css">
    <link rel="stylesheet" href="style/stylef.css">
    <section>
        <div class="container">
            <div class="container" style="display: flex; justify-content:center; flex-direction:column">
                <h2 style="text-align: center;">Job Details</h2>
                <table class="job-details">
                    <tr>
                        <th style="width:50%;text-align: right;">Job Title:</th>
                        <td style="width:50%;text-align: left;"><?php echo $job['job_title']; ?></td>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: right;">Salary:</th>
                        <td style="width:50%;text-align: left;"><?php echo $job['salary']; ?></td>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: right;">Location:</th>
                        <td style="width:50%;text-align: left;"><?php echo $job['location']; ?></td>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: right;">Description:</th>
                        <td style="width:50%;text-align: left;"><?php echo $job['description']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="container ">
                <form class="apply-form " method="post">
                    <div class="from-left">
                        <div class="form-i-group">
                            <label class="form-lable">Name*</label>
                            <input type="text" name="name" class="from-input" value="<?php echo $name; ?>" required>
                        </div>
                        <div class="form-i-group">
                            <label class="form-lable">Email*</label>
                            <input type="email" name="email" class="from-input" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="form-i-group">
                            <label class="form-lable">Highest Degree*</label>
                            <input type="text" name="highest_degree" class="from-input" value="<?php echo $highestDegree; ?>" required>
                        </div>
                        <div class="form-i-group">
                            <label class="form-lable">Contact Number*</label>
                            <input type="text" name="contact_number" class="from-input" value="<?php echo $contactNumber; ?>" required>
                        </div>
                        <div class="form-i-group">
                            <label class="form-lable">Working experience*</label>
                            <input type="text" name="working_experience" class="from-input" value="<?php echo $workingExperience; ?>" required>
                        </div>
                    </div>
                    <div class="from-right">

                        <div class="form-i-group">
                            <label class="form-lable">Skills*</label>
                            <input type="text" name="skills" class="from-input" value="<?php echo $skills; ?>" required>
                        </div>
                        <div class="form-i-group">
                            <label class="form-lable">Working hours*</label>
                            <input type="text" name="working_hours" class="from-input" value="<?php echo $workingHours; ?>" required>
                        </div>
                        <div class="form-i-group">
                            <label class="form-lable">Gender*</label>
                            <div class="gc-redio">
                                <div class="g-radio">
                                    <label for="male">Male</label>
                                    <input type="radio" name="gender" value="male" required id="male" <?php echo ($gender == 'male') ? 'checked' : ''; ?>>
                                </div>
                                <div class="g-radio">
                                    <label for="female">Female</label>
                                    <input type="radio" name="gender" value="female" required id="female" <?php echo ($gender == 'female') ? 'checked' : ''; ?>>
                                </div>
                                <div class="g-radio">
                                    <label for="notsay">prefer not say</label>
                                    <input type="radio" name="gender" value="prefer not say" required id="notsay" <?php echo ($gender == 'prefer not say') ? 'checked' : ''; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="form-i-group">
                            <label class="form-lable">Contract*</label>
                            <div class="gc-redio">
                                <div class="g-radio">
                                    <label for="permanent">Permanent</label>
                                    <input type="radio" name="contract" value="Permanent" required id="permanent" <?php echo ($contract == 'Permanent') ? 'checked' : ''; ?>>
                                </div>
                                <div class="g-radio">
                                    <label for="temporary">Temporary</label>
                                    <input type="radio" name="contract" value="Temporary" required id="temporary" <?php echo ($contract == 'Temporary') ? 'checked' : ''; ?>>
                                </div>
                                <div class="g-radio">
                                    <label for="summerjob">Summer Job</label>
                                    <input type="radio" name="contract" value="Summer Job" required id="summerjob" <?php echo ($contract == 'Summer Job') ? 'checked' : ''; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group">
                            <button class="form-btn" type="submit">Submit</button>
                            <button class="form-btn" type="button" id="reset" onclick="reloadPage()">Back</button>
                        </div>
                    </div>
                </form>
            </div>
    </section>
    <script>
        function reloadPage() {
            window.location.href = 'my_application.php'
        }

        function showAlert() {
            document.getElementById("alertBox").style.display = "block";
        }

        function closeAlert() {
            document.getElementById("alertBox").style.display = "none";
        }
    </script>
</div>

<?php include_once('inc/footer.php') ?>