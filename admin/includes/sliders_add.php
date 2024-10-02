<?php
$sliders = new sliders($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sliders->title = $_POST['title'];
    $sliders->image = uploadImage($_FILES['image'], "../images/sliders/");

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $sliders->created_at = date('Y-m-d H:i:s', time());
    $sliders->updated_at = date('Y-m-d H:i:s', time());

    if ($sliders->create()) {
        $message = "New slider added successfully";
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
                Add New Slider
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
            <form role="form" method="Post" action="index.php?page=sliders_add" enctype="multipart/form-data">
                <div class="field">
                    <label class="label">Title</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="title" class="input" type="text" placeholder="">
                        </div>
                    </div>
                    <label class="label">Image</label>
                    <div class="field" style="margin-bottom: 10px">
                        <input name="image" value="<?php echo $sliders->image ?>" class="input" type="file" placeholder="">
                    </div>
                    <button style="margin-top:10px" type="submit" class="button medium blue --jb-modal">Submit</button>
                </div>
        </div>
        </form>
    </div>
    </div>
</section>