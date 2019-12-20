<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <a href="<?php echo URLROOT ?>/posts/index" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            <div class="card card-body bg-light mt-5">
                <h2>Add Post</h2>
                <form action="./add" method="post">
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title'] ?>">
                        <span class="invalid-feedback"><?php echo $data['title_err']; ?> </span>
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" class="form-control <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" rows="3"><?php echo $data['body']; ?></textarea>
                        <span class="invalid-feedback"> <?php echo $data['body_err']; ?> </span>
                    </div>
                    <input type="submit" value="Add Post" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>