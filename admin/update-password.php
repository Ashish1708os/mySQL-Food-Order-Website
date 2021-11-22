<?php include('partials/navbar.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-35">
                <tr>
                    <td>Current Password: </td>
                    <td><input type="password" name="current_password" class="input-style" placeholder="Enter Your Current Password"></td>
                </tr>
                <tr>
                    <td>New Password: </td>
                    <td><input type="password" name="new_password" class="input-style" placeholder="Enter Your New Password"></td>
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td><input type="password" name="confirm_password" class="input-style" placeholder="Enter Your Confirm Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" value="change password" name="submit" class="btn btn-secondary" style="padding: 3%;">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
// check weather the submit button is Clicked or not
if (isset($_POST['submit'])) {
    // echo 'button clicked';
    // 1. get the data from form
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    // 2. check weather the user with current id and current password exists or not
    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

    // execute the query
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        // check weather data is available or not
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            // user exists and password can be changed
            // echo "user found";
            // 3. check weather the new password and confirm password match or not
            if ($new_password == $confirm_password) {
                // 4. change password
                // echo "password matched";
                $sql2 = "UPDATE tbl_admin SET password='$new_password' WHERE id=$id";

                // execute the query
                $res2 = mysqli_query($conn, $sql2);

                // check weather the query executed or not
                if ($res2 == true) {
                    // display msg
                    $_SESSION['change-password'] = "<div class='success'>Password Changed Successfully.</div>";
                    header('location:' . SITEURL . 'admin/manage-admin.php');
                } else {
                    // display error msg
                    $_SESSION['change-password'] = "<div class='error'>Failed To Change Password.</div>";
                    header('location:' . SITEURL . 'admin/manage-admin.php');
                }
            } else {
                //redirect to manage admin page with error msg
                $_SESSION['password-not-match'] = "<div class='error'>Password did not match.</div>";
                header('location:' . SITEURL . 'admin/manage-admin.php');
            }
        } else {
            // user does not exist set msg and redirect
            $_SESSION['user-not-found'] = "<div class='error'>User Not Found With This Id And Password</div>";
            header('location:' . SITEURL . 'admin/manage-admin.php');
        }
    }
}
?>

<?php include('partials/footer.php') ?>