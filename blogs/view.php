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
                    Titl: ' . $blog['title'] . ' <br/>
                    Description: ' . $blog['description'] . ' <br/>
                ';
            } else {
                echo 'No blog found.';
            }
            ?>
        </div>
    </div>
</div>

<?php include_once '../footer.php' ?>