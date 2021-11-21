<?php
// includes constants.php file here
include("../config/constants.php");
// 1. get the id to delete the admina
$id = $_GET['id'];

// 2.create SQL Query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

// 3.Execute the query
$res = mysqli_query($conn, $sql);

// check weather the query executed or not
if ($res == true) {
    // query executed successfully
    // echo "Admin deleted";
    //create session variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
    header('location:' . SITEURL . "admin/manage-admin.php");
} else {
    // failed to execute
    // echo "failed to delete Admin";
    $_SESSION['delete'] = "<div class='error'>failed to Delete Admin. try again later.</div>";
    header('location:' . SITEURL . "admin/manage-admin.php");
}

// 4. redirect to manage admin page with msg of either success or error
