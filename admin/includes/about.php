<?php
$about = new about($db);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $about->content = $_POST['content'];
    $about->footer = $_POST['footer'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $about->created_at = date('Y-m-d H:i:s', time());
    $about->updated_at = date('Y-m-d H:i:s', time());

    if ($about->readAll()->rowCount() > 0) {
        $about->id = 1;
    } else {
        $about->create();
    }
    $message = "About page updated successfully!";
}
$about->id = 1;
$about->read();
?>
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>Admin</li>
            <li>About Page</li>
        </ul>
    </div>
</section>
<section class="section main-section">
    <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title" style="font-size: 130%;">
                Edit About
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
            <form role="form" method="Post" action="index.php?page=about">
                <div class="field">

                    <label class="label">Content</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <textarea name="content" id="content" class="textarea"><?php echo $about->content ?></textarea>
                        </div>
                    </div>

                    <label class="label">Footer</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <textarea name="footer" id="footer" class="textarea"><?php echo $about->footer ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="button medium blue --jb-modal">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>