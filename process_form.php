<?php
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$reason = $_POST['reason'];
$board = $_POST['board'];
$marks = $_POST['marks'];
$extracurricular = $_POST['extracurricular'];
$date_of_completion = $_POST['date_of_completion'];
$gender = $_POST['gender'];

// Create connection
$conn = new mysqli('localhost', 'root', '', 'mydatabase1');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO student_info (fullname, email, reason, board, marks, extracurricular, date_of_completion, gender)
    VALUES ('$fullname', '$email', '$reason', '$board', '$marks', '$extracurricular', '$date_of_completion', '$gender')");
    $stmt->bind_param('sssissss',$fullname, $email, $reason, $board, $marks, $extracurricular, $date_of_completion, $gender);
    $stmt->execute();
    echo "registration Successfully...";
    $stmt->close();
    $conn->close();

}
?>
