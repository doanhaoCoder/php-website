<?php
$links = new links($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $links->title = $_POST['title'];
    $links->url = $_POST['url'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $links->created_at = date('Y-m-d H:i:s', time());
    $links->updated_at = date('Y-m-d H:i:s', time());

    if ($links->create()) {
        $message = "New link menu added successfully";
    }
}
?>
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>Admin</li>
            <li>links Menu</li>
        </ul>
    </div>
</section>
<section class="section main-section">
    <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title" style="font-size: 130%;">
                Add New Link Menu
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
            <form role="form" method="Post" action="index.php?page=links_add">
                <div class="field">
                    <label class="label">Title</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="title" class="input" type="text" placeholder="">
                        </div>
                    </div>
                    <label class="label">URL</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="url" class="input" type="text" placeholder="">
                        </div>
                    </div>
                    <button type="submit" class="button medium blue --jb-modal">Submit</button>
                </div>
        </div>
        </form>
    </div>
    </div>
</section>