<?php
include("../model/mydb.php");

// Retrieve all staff members
$myDB = new MyDB();
$conobj = $myDB->openCon();
$staff = $myDB->getAllStaff($conobj);

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $myDB->deleteStaff($id,$conobj);
    if ($result) {
        // Redirect back to the same page after deletion
        header("Location: staff_view.php");
        exit;
    } else {
        echo "Error deleting staff member.";
    }
}

?>
