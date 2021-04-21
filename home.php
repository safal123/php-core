<?php include_once 'header.php' ?>
<?php
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
require_once 'includes/functions.inc.php';
require_once 'includes/dbh.inc.php';
?>

<div class="container">
    <h3>
        Welcome user..
        <?php echo $_SESSION["email"] ?> <br>
        <?php echo $_SESSION["name"] ?>
    </h3>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                All Blogs
                <a href="blogs/create.php">Add new</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <td scope="col">Id</td>
                        <td scope="col">Author</td>
                        <td scope="col">Title</td>
                        <td scope="col">Description</td>
                        <td scope="col">Created At</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (allBlogs($conn) as $blogs) {
                        echo '<tr>
                            <td>' . $blogs[0] . '</td>
                            <td>' . findUserById($conn, $blogs[1]) . '</td>
                            <td>' . $blogs[2] . '</td>
                            <td>' . $blogs[3] . '</td>
                            <td>' . $blogs[4] . '</td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php include_once 'footer.php' ?>