<?php
class MyDB{

function openCon(){
$conn = new mysqli("localhost","root","","restaurant_project");
return $conn;
}
function closeCon($conn) {
    $conn->close();
}
function insertData($tablename, $fname,$lname,$email,$dob,$phone,$gender, $password,$conn){
$sql="INSERT INTO $tablename (first_name, last_name, email, dob, phone, gender, password) VALUES 
('$fname','$lname','$email','$dob','$phone','$gender','$password')";
$result=$conn->query($sql);
return $result;
}

function checkUser($tablename, $email, $password, $conn){
    $sql="SELECT * FROM $tablename WHERE email='$email' AND 
    password='$password'";
    $result=$conn->query($sql);
return $result;
}

function viewUser($tablename, $email, $conn){
    $sql="SELECT * FROM $tablename WHERE email='$email' ";
    $result=$conn->query($sql);
return $result;
}
//stafff
function addStaff($username, $password, $email, $fullName, $position, $conn) {
    $query = "INSERT INTO restaurant_staff (username, password, email, full_name, position) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $username, $password, $email, $fullName, $position);
    $result = $stmt->execute();
    return $result;
}


    // Function to retrieve all staff members
    function getAllStaff($conobj) {
        $query = "SELECT * FROM restaurant_staff";
        $result = $conobj->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to retrieve a staff member by ID
    function getStaffById($id, $conn) {
        $query = "SELECT * FROM restaurant_staff WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    function updateStaff($id, $username, $password, $email, $fullName, $position, $conn) {
        $query = "UPDATE restaurant_staff SET username = ?, password = ?, email = ?, full_name = ?, position = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $username, $password, $email, $fullName, $position, $id);
        return $stmt->execute();
    }

    function deleteStaff($id, $conn) {
        $query = "DELETE FROM restaurant_staff WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

}

?>