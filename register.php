<?php include_once 'header.php' ?>
<?php
if (isset($_SESSION['email'])) {
    header('location: home.php');
}
?>

<div class='container mt-4'>
    <div class="card">
        <div class="card-header">
            <h3>Please Register</h3>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] === "emptyInput") {
                    echo '
                    <small class="text-danger">Please fill all input fields.</small>
                    ';
                }
            }
            ?>
        </div>
        <div class="card-body">
            <form action="includes/register.inc.php" method="POST">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <label for="name">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Email Address">
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] === "emailTaken") {
                            echo '
                            <small class="text-danger">Email address is already taken.</small>
                            ';
                        }
                        if ($_GET["error"] === "invalidEmail") {
                            echo '
                            <small class="text-danger">Email address is badly formatted.</small>
                            ';
                        }
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] === "passwordMisMatch") {
                            echo '
                            <small class="text-danger">Password and confirm password does not match.</small>
                            ';
                        }
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="name">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Create Account</button>
            </form>
        </div>
    </div>
</div>

<?php include_once 'footer.php' ?>