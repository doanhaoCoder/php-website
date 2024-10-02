<?php
$blogcategories = new blogcategories($db);
$stmt_categories = $blogcategories->readAll();

$blogs = new blogs($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $blogs->id_user = $_SESSION['user_id'];

    $blogs->title = $_POST['title'];
    $blogs->content = $_POST['content'];
    $blogs->id_category = $_POST['id_category'];

    //upload Image
    if (!empty($_FILES['image']['name'])) {
        $upload_file_name = uploadImage($_FILES['image'], '../images/blogs/');
        $blogs->image = $upload_file_name;
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $blogs->created_at = date('Y-m-d H:i:s', time());
    $blogs->updated_at = date('Y-m-d H:i:s', time());

    if ($blogs->create()) {
        $message = "New blog post added successfully";
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
                Add New Blogs Post
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
            <form role="form" method="Post" action="index.php?page=blogs_add" enctype="multipart/form-data">
                <div class="field">
                    <label class="label">Selects</label>
                    <div class="control">
                        <div class="select">
                            <select name="id_category">
                                <?php
                                while ($rows = $stmt_categories->fetch()) {
                                ?>
                                    <option value="<?php echo $rows['id'] ?>"><?php echo $rows['title'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Title</label>
                        <div class="field-body">
                            <div class="field" style="margin-bottom: 10px">
                                <input name="title" class="input" type="text" placeholder="">
                            </div>
                        </div>

                        <label class="label">File input</label>

                        <div class="field" style="margin-bottom: 10px">
                            <input name="image" value="<?php echo $blogs->image ?>" class="input" type="file" placeholder="">
                        </div>


                        <div class="field">
                            <label class="label">Text area</label>
                            <div class="control">
                                <textarea name="content" class="textarea" id="content"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="button medium blue --jb-modal">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>