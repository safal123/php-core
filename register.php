<?php include_once 'header.php' ?>

<div class='container mt-4'>
    <div class="card">
        <div class="card-header">
            <h3>Please Register</h3>
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
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
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