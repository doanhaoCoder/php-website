<?php
if ($_GET['id']) {
    $blogcategories->id = $_GET['id'];
    $blogcategories->read();
}
?>

<div class="container" style="margin-top: 30px; background-color: #F1F1F1; padding: 15px;">
    <h3 style="text-align: center; margin: 30px auto; color:#F3BD00"><?php echo $blogcategories->title ?></h3>
    <div class=" row g-4 justify-content-center">
        <?php
        while ($rows = $stmt_blogs->fetch()) {

            if ($rows['id_category'] == $blogcategories->id) {
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
        }
        ?>
    </div>
</div>

<script>
    document.getElementById('carouselExampleControls').style.display = 'none';
    document.getElementById('blogcategory_active').style.color = '#F3BD00';
</script>