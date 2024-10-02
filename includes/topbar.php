<div class="container-fluid bg-dark text-light p-0">
    <div>
        <div class="h-100 d-inline-flex align-items-center mx-n2">
            <?php
            while ($rows = $stmt_socials->fetch()) {
            ?>
                <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href="<?php echo $rows['url'] ?>"><?php echo $rows['icon'] ?></a>
            <?php
            }
            ?>
        </div>
    </div>
</div>