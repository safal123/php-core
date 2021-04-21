<?php include_once '../header.php' ?>
<?php
if (!isset($_SESSION['email'])) {
    header('location: ../login.php');
}
?>

<div class="container">
    <div class="card mt-2">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                Add new blog
                <a href="../home.php">View all</a>
            </div>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] === "missingField") {
                    echo '<small class="text-danger">Title and description fields are requred.</small>';
                }
            }
            ?>
        </div>
        <div class="card-body">
            <form action="../includes/blogs/create.inc.php" method="POST">
                <div class="form-group">
                    <div class="label">Title</div>
                    <input type="text" name="title" class="form-control" placeholder="Blog Title">
                </div>
                <div class="form-group">
                    <div class="label">Description</div>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Create new blog</button>
            </form>
        </div>
    </div>
</div>

<?php include_once '../footer.php' ?>