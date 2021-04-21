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
            <table class="table table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <td scope="col">Id</td>
                        <td scope="col">Author</td>
                        <td scope="col">Title</td>
                        <td scope="col">Description</td>
                        <td scope="col">Created At</td>
                        <td scope="col">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (allBlogs($conn)) {
                        foreach (allBlogs($conn) as $blogs) {
                            echo '<tr>
                            <td>' . $blogs[0] . '</td>
                            <td>' . findUserById($conn, $blogs[1]) . '</td>
                            <td>' . $blogs[2] . '</td>
                            <td>' . $blogs[3] . '</td>
                            <td>' . $blogs[4] . '</td>
                            <td class="d-flex">
                                <a href="/blogs/view.php?id=' . $blogs[0] . '" class="btn btn-primary btn-sm text-white mr-2">View<a/>
                                <form action="/includes/deleteBlog.inc.php?id=' . $blogs[0] . '" method="POST">
                                    <button name="submit" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>';
                        }
                    } else {
                        echo '<tr>
                            <td colspan="6" class="bg-info text-center">No record found.</td>
                        <tr>';
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php include_once 'footer.php' ?>