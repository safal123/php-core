<?php include_once 'header.php' ?>
<?php
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
require_once 'includes/functions.inc.php';
require_once 'includes/dbh.inc.php';
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg, 70);

// send email
mail("pokharelsafal66@gmail.com", "My subject", $msg);
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
                        <td scope="col">Image</td>
                        <td scope="col">Created At</td>
                        <td scope="col">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($blogs = allBlogs($conn)) {
                        foreach ($blogs as $blog) {
                            $blogId = $blog[1];
                            $userId = $_SESSION["id"];
                            echo '<tr>
                            <td>' . $blog[0] . '</td>
                            <td>' . findUserById($conn, $blog[1]) . '</td>
                            <td><a href="/blogs/view.php?id=' . $blog[0] . '">' . $blog[2] . '</a></td>
                            <td>' . $blog[3] . '</td>
                            <td>' . $blog[4] . '</td>
                            <td><img class="img-fluid img-thumbnail" height="100" width="100" src="' . $blog[4] . '"></td>
                            <td class="d-flex">
                                ' . ($blogId === $userId ? '
                                    <a href="/blogs/edit.php?id=' . $blog[0] . '" class="btn btn-info btn-sm text-white mr-2">Edit<a/>
                                    <form action="/includes/deleteBlog.inc.php?id=' . $blog[0] . '" method="POST">
                                        <button name="submit" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                ' : '') . '
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