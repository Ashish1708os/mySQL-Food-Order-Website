<?php include('partials/navbar.php') ?>

<!-- Main Content Section Starts -->
<Div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1><br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; // Displaying session message
            unset($_SESSION['add']); // removing session message
        }
        ?>
        <br>
        <br>
        <!-- button to add admin -->
        <a href="add-admin.php" class="btn btn-primary">Add Admin</a><br><br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>UserName</th>
                <th>Actions</th>
            </tr>
            <?php
            // Query to Get all admin
            $sql = "SELECT * FROM tbl_admin";
            // Execute the Query
            $res = mysqli_query($conn, $sql);

            // check weather the Query is executed or not
            if ($res == true) {
                // count how many rows are in table
                $count = mysqli_num_rows($res); // function to get all the rows in database

                $sn = 1; //create a variable and assign the value

                //check the num of rows
                if ($count > 0) {
                    // we have data in database
                    while ($rows = mysqli_fetch_assoc($res)) {
                        // using while loop to get all the data from database
                        // and while loop will run as long as we have data in database

                        // get indiividual data
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                        // display the value in our table
            ?>
                        <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $full_name ?></td>
                            <td><?php echo $username ?></td>
                            <td>
                                <a href="#" class="btn btn-secondary">Update Admin</a>
                                <a href="#" class="btn btn-denger">Delete Admin</a>
                            </td>
                        </tr>
            <?php
                    }
                } else {
                    // we don't have data in database
                }
            }
            ?>
        </table>
    </div>
</Div>
<!-- Main Content Section Ends -->

<?php include('partials/footer.php') ?>