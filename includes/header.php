<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
        <h2 class="m-0"> <img style="width: 75px; height: 75px;" src="images/<?php echo $settings->site_logo ?>" alt="Homepage"><?php echo $settings->site_name ?></h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link  <?php echo setActive2('index.php') ?>">Home</a>
            <div class="nav-item dropdown">
                <a id="blogcategory_active" href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Categories</a>
                <div class="dropdown-menu bg-light m-0">
                    <?php
                    while ($rows = $stmt_blogcategories->fetch()) {
                    ?>
                        <a href="index.php?page=category&id=<?php echo $rows['id'] ?>" class="dropdown-item"><?php echo $rows['title'] ?></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <a href="terms.php" class="nav-item nav-link <?php echo setActive2('terms.php') ?>">Terms</a>
            <a href="about.php" class="nav-item nav-link <?php echo setActive2('about.php') ?>">About</a>
            <a href="contact.php" class="nav-item nav-link <?php echo setActive2('contact.php') ?>">Contact</a>
        </div>
    </div>
</nav>