<?php
$blogcategories = new blogcategories($db);

if ($_GET['id']) {
    $blogcategories->id = $_GET['id'];
    $blogcategories->read();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blogcategories->title = $_POST['title'];
    $blogcategories->status = isset($_POST['status']) == 'on' ? 1 : 0;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $blogcategories->updated_at = date('Y-m-d H:i:s', time());

    if ($blogcategories->update()) {
        $message = "Blog category updated successfully";
    }
}
?>
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>Admin</li>
            <li>Blog Categories</li>
        </ul>
    </div>
</section>
<section class="section main-section">
    <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title" style="font-size: 130%;">
                Edit Blog Category
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
            <form role="form" method="Post" action="index.php?page=blogcategories_edit&id=<?php echo $_GET['id'] ?>">
                <div class="field">
                    <label class="label">Title</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input class="input" type="text" placeholder="" name="title" value="<?php echo $blogcategories->title ?>">
                        </div>
                        <label class="checkbox">
                            <input type="checkbox" name="status" <?php echo $blogcategories->status == 1 ? "checked" : "" ?>>
                            <span class="check"></span>
                            <span class="control-label">Status</span>
                        </label>
                    </div>
                    <button type="submit" class="button medium blue --jb-modal">Submit</button>
                </div>
        </div>
        </form>
    </div>
    </div>
</section>