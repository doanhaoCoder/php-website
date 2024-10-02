<?php
$sliders = new sliders($db);
$stmt_sliders = $sliders->readAll();
?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        $index = 0;
        while ($rows = $stmt_sliders->fetch()) {
            // Xác định slide active
            $active = ($index === 0) ? 'active' : '';
        ?>
            <div class="carousel-item <?php echo $active; ?>" style="position:relative">
                <img class="d-block w-100" src="<?php echo "images/sliders/" . $rows['image'] ?>" alt="Image">
                <h1 style="position: absolute; top:100px; width:100%; text-align: center; font-size:500%; color:white"><?php echo $rows['title'] ?></h1>
            </div>
        <?php
            $index++;
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var slides = document.querySelectorAll('.carousel-item');
        var totalSlides = slides.length;
        var currentSlide = 0;

        // Bắt sự kiện khi click nút Previous
        document.querySelector('.carousel-control-prev').addEventListener('click', function(event) {
            event.preventDefault();
            goToSlide(currentSlide - 1);
        });

        // Bắt sự kiện khi click nút Next
        document.querySelector('.carousel-control-next').addEventListener('click', function(event) {
            event.preventDefault();
            goToSlide(currentSlide + 1);
        });

        // Hàm chuyển slide
        function goToSlide(n) {
            slides[currentSlide].classList.remove('active');
            currentSlide = (n + totalSlides) % totalSlides;
            slides[currentSlide].classList.add('active');
        }
    });
</script>