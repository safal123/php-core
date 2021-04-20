<?php include_once 'header.php' ?>
<?php
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
?>

<div class="container">
    <h1>Welcome user..
        <?php echo $_SESSION["email"] ?>
    </h1>
</div>

<?php include_once 'footer.php' ?>