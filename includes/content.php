<?php
$blogs = new blogs($db);
$stmt_blogs = $blogs->readAll();
?>
<?php
if ($page == 'blog_read_more') {
    include "includes/blog_read_more.php";
} else
if ($page == 'category') {
    include "includes/category.php";
} else {
?>
    <div class="container" style="margin-top: 30px; background-color: #F3F6F8; padding: 15px;">
        <div class=" row g-4 justify-content-center">
            <?php
            while ($rows = $stmt_blogs->fetch()) {
            ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="margin-bottom: 0px;">
                    <div class="courses-item d-flex flex-column bg-white overflow-hidden h-100">
                        <div class="text-center p-4 pt-0" style="margin-top:30px">
                            <h5 class="mb-3"><?php echo $rows['title'] ?></h5>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="<?php echo "images/blogs/" . $rows['image'] ?>" alt="">
                            <div class="courses-overlay">
                                <a id="readMoreBtn" class="btn btn-outline-primary border-2" href="index.php?page=blog_read_more&id=<?php echo $rows['id'] ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
<?php
}
?>