<?php
$sliders = new sliders($db);

if ($_GET['id']) {
    $sliders->id = $_GET['id'];
    $sliders->read();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sliders->title = $_POST['title'];

    if (!empty($_FILES['image']['name'])) {
        if ($sliders->image) {
            $sliders->image = updateImage($_FILES['image'], $sliders->image, "../images/sliders/");
        } else {
            $sliders->image = uploadImage($_FILES['image'], "../images/sliders/");
        }
    }

    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $sliders->updated_at = date('Y-m-d H:i:s', time());

    if ($sliders->update()) {
        $message = "Slider updated successfully";
    }
}
?>
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>Admin</li>
            <li>Slider</li>
        </ul>
    </div>
</section>
<section class="section main-section">
    <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title" style="font-size: 130%;">
                Edit Slider
            </p>
        </header>
        <?php
        if (!empty($message)) {
        ?>
            <div class="notification green" style="margin: 10px auto; padding: 12px">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                    <div>
                        <?php echo $message ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="card-content">
            <form role="form" method="Post" action="index.php?page=sliders_edit&id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
                <div class="field">
                    <label class="label">Title</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="title" class="input" type="text" placeholder="" value="<?php echo $sliders->title ?>">
                        </div>
                    </div>
                    <?php
                    if ($sliders->image) {
                    ?>
                        <div>
                            <img src="<?php echo "../images/sliders/" . $sliders->image ?>" width='150px' alt="">
                        </div>
                    <?php
                    }
                    ?>
                    <label class="label">Image</label>
                    <div class="field-body">
                        <div class="field file">
                            <label class="upload control">
                                <a class="button green">Upload</a>
                                <input name="image" type="file">
                            </label>
                        </div>
                    </div>
                    <button style="margin-top:10px" type="submit" class="button medium blue --jb-modal">Submit</button>
                </div>
        </div>
        </form>
    </div>
    </div>
</section>