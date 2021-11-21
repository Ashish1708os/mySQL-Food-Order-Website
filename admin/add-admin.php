<?php include('partials/navbar.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; // Displaying session message
            unset($_SESSION['add']); // removing session message
        }
        ?>
        <br>
        <br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" class="input-style" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Usernamee: </td>
                    <td><input type="text" name="username" class="input-style" placeholder="Enter Your Username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" class="input-style" placeholder="Enter Your Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Add Admin" name="submit" class="btn btn-secondary" style="padding: 3%;">
                    </td>
                </tr>
            </table>
        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
$insert = false;
if (isset($_POST['submit'])) {
    // button clicked.
    // echo "button clicked";

    // 1. getting data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // password encrypted with md5

    // 2. SQL Query to save the data into database
    $sql = "INSERT INTO tbl_admin SET
        full_name = '$full_name',
        username = '$username',
        password = '$password'
    ";

    // echo $sql;

    // 3. execute Query and save data in database
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    // 4.check weather the (query is exicuted) data is inserted or not and display appropriate msg
    if ($res == true) {
        // echo "data inserted";
        // creating a session variable to display msg
        $_SESSION['add'] = "Admin Added Successfully";
        // redirect page
        header("location:" . SITEURL . 'admin/manage-admin.php');
    } else {
        // echo 'failed to insert data';
        // creating a session variable to display msg
        $_SESSION['add'] = "failed to add admin";
        // redirect page
        header("location:" . SITEURL . 'admin/add-admin.php');
    }
}
?>