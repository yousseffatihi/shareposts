<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="jumbotron jumbotron-flud">
    <h1 class="display-3"><?php echo $data['title']; ?></h1>
    <p class="lead"><?php echo $data['description']; ?></p>
    <?php print_r($_SESSION); ?>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>