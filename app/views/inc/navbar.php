<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT . '/pages/about'; ?>">About</a>
            </li>
        </ul>
        <?php if(isset($_SESSION['user_id'])) : ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Hi <?php echo $_SESSION['user_name']; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT . '/users/logout'; ?>">Logout</a>
            </li>
        </ul>
        <?php else : ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo URLROOT . '/users/register'; ?>">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT . '/users/login'; ?>">Login</a>
            </li>
        </ul>
        <?php endif; ?>
    </div>
</nav>