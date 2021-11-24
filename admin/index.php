<?php include('partials/navbar.php') ?>

<!-- Main Content Section Starts -->
<Div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <br>
        <div class="col-4 text-center">
            <h1>5</h1><br>
            categories
        </div>
        <div class="col-4 text-center">
            <h1>5</h1><br>
            categories
        </div>
        <div class="col-4 text-center">
            <h1>5</h1><br>
            categories
        </div>
        <div class="col-4 text-center">
            <h1>5</h1><br>
            categories
        </div>
        <div class="clear-fix"></div>
    </div>
</Div>
<!-- Main Content Section Ends -->

<?php include('partials/footer.php') ?>