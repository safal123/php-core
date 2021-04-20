<?php include_once 'header.php' ?>

    <div class='container mt-4'>
        <div class="card">
            <div class="card-header">
                <h3>Please Login</h3>
            </div>
            <div class="card-body">
                <form action="includes/login.inc.php" method="POST">
                    <div class="form-group">
                        <label for="name">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

<?php include_once 'footer.php' ?>

 