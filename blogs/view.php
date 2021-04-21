<?php include_once '../header.php' ?>
<?php
if (!isset($_SESSION['email'])) {
    header('location: ../login.php');
}
require_once '../includes/functions.inc.php';
require_once '../includes/dbh.inc.php';
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
            <?php
            if ($blog = findBlogById($conn, $_GET['id'])) {
                echo '
                    <h1>Title: ' . $blog['title'] . ' <br/></h1>
                    Description: ' . $blog['description'] . ' <br/>
                    ' . ($blog['user_id'] === $_SESSION["id"] ?
                    '<a href="edit.php?id=' . $blog['id'] . '" class="btn btn-sm btn-info text-white">Edit</a>' : '') . '
                ';
            } else {
                echo 'No blog found.';
            }
            ?>
        </div>
    </div>
</div>

<?php include_once '../footer.php' ?>