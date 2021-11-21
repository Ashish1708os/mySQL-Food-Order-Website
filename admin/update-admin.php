<?php include('partials/navbar.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br>
        <br>
        <?php
        // 1. get the id of the selected admin
        $id = $_GET['id'];

        // 2. create SQL query to get the details
        $sql = "SELECT * FROM tbl_admin WHERE id=$id";

        // execute the query 
        $res = mysqli_query($conn, $sql);

        // check weather the query is executed or not
        if ($res == true) {
            //  check weather the data is available or not
            $count = mysqli_num_rows($res);
            // Check weather we have admin data or not
            if ($count == 1) {
                // get the details
                // echo "admin available";
                $row = mysqli_fetch_assoc($res);

                $full_name = $row['full_name'];
                $username = $row['username'];
            } else {
                // redirect to manage admin page
                header('location:' . SITEURL . 'admin/manage-admin.php');
            }
        }

        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" class="input-style" placeholder="Enter Your Name" value="<?php echo $full_name; ?>"></td>
                </tr>
                <tr>
                    <td>Usernamee: </td>
                    <td><input type="text" name="username" class="input-style" placeholder="Enter Your Username" value="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" value="Update Admin" name="submit" class="btn btn-secondary" style="padding: 3%;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
// check weather the submit button is clicked or not
if (isset($_POST['submit'])) {
    // echo "button clicked";
    // get all the values from form to update
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    // create a SQL query to update the data
    $sql = "UPDATE tbl_admin SET full_name = '$full_name', username = '$username' WHERE id = '$id'";

    // execute the query
    $res = mysqli_query($conn, $sql);

    // check weather the query is executed or not
    if ($res == true) {
        // query executed and admin updated
        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully</div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    } else {
        // failed to update admin
        $_SESSION['update'] = "<div class='error'>Failed to Update Admin</div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }
}
?>

<?php include('partials/footer.php'); ?>