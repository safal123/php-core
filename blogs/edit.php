<?php include_once '../header.php' ?>
<?php
if (!isset($_SESSION['email'])) {
    header('location: ../login.php');
}
require_once '../includes/functions.inc.php';
require_once '../includes/dbh.inc.php';

$blog = findBlogById($conn, $_GET["id"]);
if ($_SESSION["id"] !== $blog["user_id"]) {
    header("location: ../home.php");
    flash()->warning('Unauthorized.');
}
?>

<div class="container">
    <div class="card mt-2">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                Blog
                <a href="../home.php">View All</a>
            </div>
        </div>
        <div class="card-body">
            <form action="../includes/update.inc.php?id=<?php echo $_GET["id"] ?>" method="POST">
                <div class="form-group">
                    <div class="label">Title</div>
                    <input type="text" value="<?php echo findBlogById($conn, $_GET["id"])['title'] ?>" name="title" class="form-control" placeholder="Blog Title">
                </div>
                <div class="form-group">
                    <div class="label">Description</div>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?php echo findBlogById($conn, $_GET["id"])['description'] ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update Blog</button>
                <a href="view.php?id=<?php echo $_GET["id"] ?>" class="btn btn-sm btn-info">View</a>
            </form>
        </div>
    </div>
</div>

<?php include_once '../footer.php' ?>