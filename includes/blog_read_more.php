<?php
if ($_GET['id']) {
    $blogs->id = $_GET['id'];
    $blogs->read();
}

$comments = new comments($db);
// Đọc tất cả comments
$stmt_categories = $comments->readAll();

$stmt_categories2 = $comments->readAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comments->name = $_POST['name'];
    $comments->email = $_POST['email'];
    $comments->comment = $_POST['comment'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $comments->created_at = date('Y-m-d H:i:s', time());
    $comments->updated_at = date('Y-m-d H:i:s', time());

    $comments->id_blog = $blogs->id;

    $comments->id_parent_comment = $_POST['id_parent_comment'];

    if ($comments->create()) {
        $message = "Comment added successfully";
    }
    // Đọc lại tất cả comments sau khi thêm mới
    $stmt_categories = $comments->readAll();
}
?>

<div class="container" style="margin-top: 30px; background-color: #F3F6F8; padding: 15px;">
    <div class="row g-5">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <div class="position-relative overflow-hidden  h-100" style="min-height: 400px;">
                <img class="position-absolute w-100" src="<?php echo "images/blogs/" . $blogs->image ?>" alt="" style="object-fit: cover;">
            </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
            <div class="h-100">
                <h1 class="display-6 mb-4"><?php echo $blogs->title ?></h1>
                <p>Created at: <?php echo $blogs->created_at ?></p>
                <p><?php echo $blogs->content ?></p>
            </div>
        </div>
    </div>
</div>
<!-- Comments -->

<div style="width: 100%; display: flex; justify-content: center;">
    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
        <?php
        while ($rows = $stmt_categories->fetch()) {
            $bienreply = $rows['id'];
            $stmt_categories2->execute();
            if ($rows['id_blog'] == $blogs->id && $rows['id_parent_comment'] == 0) {
        ?>
                <div style="background-color: #F3F6F8; padding: 15px; margin-top: 15px; border: solid 2px #F3BD00">
                    <div>
                        <p style="color: black"><b><?php echo  $rows['created_at'] . " | " ?><?php echo $rows['email'] . " | " ?><?php echo $rows['name'] . ":" ?></b><br><?php echo $rows['comment']  ?></p>
                    </div>

                    <?php
                    while ($rows = $stmt_categories2->fetch()) {
                        if ($bienreply == $rows['id_parent_comment'] && $rows['id_parent_comment'] != 0) {
                    ?>
                            <div style="background-color: #F3F6F8; padding: 15px; margin-top: 15px; border: solid 2px #F3BD00">
                                <div>
                                    <p style="color: black"><b><?php echo "Reply: " . $rows['created_at'] . " | " ?><?php echo $rows['email'] . " | " ?><?php echo $rows['name'] . ":" ?></b><br><?php echo $rows['comment']  ?></p>
                                </div>
                            </div>
                    <?php
                        }
                    } ?>

                    <div>
                        <button style="background-color: #F3BD00; border:none; color: white; margin-top:15px" onclick="hiddenReply(<?php echo $bienreply ?>)">Reply</button>
                    </div>
                </div>

                <form style="display: none;" id="reply<?php echo $bienreply ?>" class="s-content__form" role="form" method="Post" action="index.php?page=blog_read_more&id=<?php echo $blogs->id ?>" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0 bg-light" id="name" name="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control border-0 bg-light" id="email" name="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control border-0 bg-light" placeholder="Leave a message here" id="comment" name="comment" style="height: 150px"></textarea>
                                <label for="message">Comments</label>
                            </div>
                        </div>
                        <select name="id_parent_comment" style=" visibility: hidden;">
                            <option value="<?php echo $bienreply ?>"><?php echo $bienreply ?></option>
                        </select>
                        <div class="col-12">
                            <button class="btn btn-primary py-3 px-5" type="submit">Submit</button>
                        </div>
                        <div style="margin-top: 10px;" id="contact_send"></div>
                    </div>
                </form>
        <?php
            }
            $stmt_categories2->execute();
        }
        ?>
        <h2 style="color: #F3BD00; text-align: center">Comment for blog</h2>
        <form class="s-content__form" role="form" method="Post" action="index.php?page=blog_read_more&id=<?php echo $blogs->id ?>" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control border-0 bg-light" id="name" name="name" placeholder="Your Name">
                        <label for="name">Your Name</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="email" class="form-control border-0 bg-light" id="email" name="email" placeholder="Your Email">
                        <label for="email">Your Email</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control border-0 bg-light" placeholder="Leave a message here" id="comment" name="comment" style="height: 150px"></textarea>
                        <label for="message">Comments</label>
                    </div>
                </div>
                <select name="id_parent_comment" style=" visibility: hidden;">
                    <option value="0 ?>">0</option>
                </select>
                <div class="col-12">
                    <button class="btn btn-primary py-3 px-5" type="submit">Submit</button>
                </div>
                <div style="margin-top: 10px;" id="contact_send"></div>
            </div>
        </form>
        <?php
        if (!empty($message)) {
        ?>
            <div>
                <?php echo $message ?>
            </div>
        <?php } ?>
        <script>
            document.getElementById('carouselExampleControls').style.display = 'none';

            function hiddenReply(id) {
                console.log('reply' + id);
                document.getElementById('reply' + id).style.display = 'block';
            }
        </script>
    </div>
</div>