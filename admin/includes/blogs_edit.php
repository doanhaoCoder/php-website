<?php
$blogcategories = new blogcategories($db);
$stmt_categories = $blogcategories->readAll();

$blogs = new blogs($db);


if ($_GET['id']) {
    $blogs->id = $_GET['id'];
    $blogs->read();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $blogs->id_user = $_SESSION['user_id'];

    $blogs->title = $_POST['title'];
    $blogs->content = $_POST['content'];
    $blogs->id_category = $_POST['id_category'];
    $blogs->status = isset($_POST['status']) == 'on' ? 1 : 0;

    //update Image
    if (!empty($_FILES['image']['name'])) {
        if ($blogs->image) {
            $upload_file_name = updateImage($_FILES['image'], $blogs->image, '../images/blogs/');
        } else {
            $upload_file_name = uploadImage($_FILES['image'], '../images/blogs/');
        }
        $blogs->image = $upload_file_name;
    }

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $blogs->updated_at = date('Y-m-d H:i:s', time());

    if ($blogs->update()) {
        $message = "Blog post updated successfully";
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
                Edit Blogs Post
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
            <form role="form" method="Post" action="index.php?page=blogs_edit&id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">

                <label class="label">Selects</label>
                <div class="control">
                    <div class="select">
                        <select name="id_category">
                            <?php
                            while ($rows = $stmt_categories->fetch()) {
                            ?>
                                <option value="<?php echo $rows['id'] ?>" <?php echo $rows['id'] == $blogs->id_category ?
                                                                                "selected" : "" ?>><?php echo $rows['title'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <label class="label">Title</label>

                <div class="field" style="margin-bottom: 10px">
                    <input name="title" class="input" type="text" placeholder="" value="<?php echo $blogs->title ?>">
                </div>

                <div class="field">
                    <img src="<?php echo "../images/blogs/" . $blogs->image ?>" width="200px" alt="">
                </div>
                <label class="label">File input</label>
                <div class="field-body">
                    <div class="field file">
                        <label class="upload control">
                            <a class="button green">Upload</a>
                            <input name="image" type="file">
                        </label>
                    </div>

                    <label class="checkbox">
                        <input type="checkbox" name="status" <?php echo $blogs->status == 1 ? "checked" : "" ?>>
                        <span class="check"></span>
                        <span class="control-label">Status</span>
                    </label>

                    <div class="field">
                        <label class="label">Text area</label>
                        <div class="control">
                            <textarea name="content" class="textarea"><?php echo $blogs->content ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="button medium blue --jb-modal">Submit</button>
            </form>
        </div>
    </div>
</section>