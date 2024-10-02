<?php
$settings = new settings($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($settings->readAll()->rowCount() > 0) {
        $settings->id = 1;
        $settings->read();

        if (!empty($_FILES['site_logo']['name'])) {
            $settings->site_logo = updateImage($_FILES['site_logo'], $settings->site_logo, "../images/");
        }
        if (!empty($_FILES['site_favicon']['name'])) {
            $settings->site_favicon = updateImage($_FILES['site_favicon'], $settings->site_favicon, "../images/");
        }

        $settings->site_name = $_POST['site_name'];
        $settings->site_timezone = $_POST['site_timezone'];
        $settings->site_map = $_POST['site_map'];
        $settings->site_footer = $_POST['site_footer'];
        $settings->contact_phone = $_POST['contact_phone'];
        $settings->contact_email = $_POST['contact_email'];
        $settings->contact_address = $_POST['contact_address'];
        if ($_POST['site_timezone']) {
            date_default_timezone_set($_POST['site_timezone']);
        }
        $settings->created_at = date('Y-m-d H:i:s', time());
        $settings->updated_at = date('Y-m-d H:i:s', time());
        $settings->update();
    } else {
        if (!empty($_FILES['site_logo']['name'])) {
            $settings->site_logo = uploadImage($_FILES['site_logo'], "../images/");
        }
        if (!empty($_FILES['site_favicon']['name'])) {
            $settings->site_favicon = uploadImage($_FILES['site_favicon'], "../images/");
        }
        $settings->site_name = $_POST['site_name'];
        $settings->site_timezone = $_POST['site_timezone'];
        $settings->site_map = $_POST['site_map'];
        $settings->site_footer = $_POST['site_footer'];
        $settings->contact_phone = $_POST['contact_phone'];
        $settings->contact_email = $_POST['contact_email'];
        $settings->contact_address = $_POST['contact_address'];
        if ($_POST['site_timezone']) {
            date_default_timezone_set($_POST['site_timezone']);
        }
        $settings->created_at = date('Y-m-d H:i:s', time());
        $settings->updated_at = date('Y-m-d H:i:s', time());
        $settings->create();
    }
    $message = "Settings page updated successfully!";
}
$settings->id = 1;
$settings->read();
?>
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>Admin</li>
            <li>Settings Page</li>
        </ul>
    </div>
</section>
<section class="section main-section">
    <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title" style="font-size: 130%;">
                Edit settings
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
            <form role="form" method="Post" action="index.php?page=settings" enctype="multipart/form-data">
                <div class="field">
                    <label class="label">Site Name</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="site_name" value="<?php echo $settings->site_name ?>" class="input" type="text" placeholder="">
                        </div>
                    </div>
                    <?php
                    if ($settings->site_logo) {
                    ?>
                        <div>
                            <img src="<?php echo "../images/" . $settings->site_logo ?>" width="150px" alt="">
                        </div>
                    <?php
                    }
                    ?>
                    <label class="label">Site Logo</label>

                    <div class="field" style="margin-bottom: 10px">
                        <input name="site_logo" value="<?php echo $settings->site_logo ?>" class="input" type="file" placeholder="">
                    </div>
                    <?php
                    if ($settings->site_favicon) {
                    ?>
                        <div>
                            <img src="<?php echo "../images/" . $settings->site_favicon ?>" width="150px" alt="">
                        </div>
                    <?php
                    }
                    ?>
                    <label class="label">Site Favicon</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="site_favicon" value="<?php echo $settings->site_favicon ?>" class="input" type="file" placeholder="">
                        </div>
                    </div>

                    <label class="label">Site Map</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="site_map" value="<?php echo htmlspecialchars($settings->site_map) ?>" class="input" type="text" placeholder="">
                        </div>
                    </div>

                    <label class="label">Site Timezone</label>
                    <div class="control">
                        <div class="select">
                            <select name="site_timezone" id="" class="control">
                                <option value="Asia/Ho_Chi_Minh">Select Timezone</option>
                                <?php
                                foreach (setTimezone() as $key => $value) {
                                ?>
                                    <option value="<?php echo $key ?>"><?php echo $key == $settings->site_timezone ? "selected" : "" ?>
                                        <?php echo $value ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <label class="label">Site Footer</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="site_footer" value="<?php echo $settings->site_footer ?>" class="input" type="text" placeholder="">
                        </div>
                    </div>

                    <label class="label">Email</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="contact_email" value="<?php echo $settings->contact_email ?>" class="input" type="text" placeholder="">
                        </div>
                    </div>

                    <label class="label">Phone</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="contact_phone" value="<?php echo $settings->contact_phone ?>" class="input" type="text" placeholder="">
                        </div>
                    </div>

                    <label class="label">Address</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="contact_address" value="<?php echo $settings->contact_address ?>" class="input" type="text" placeholder="">
                        </div>
                    </div>

                    <button type="submit" class="button medium blue --jb-modal">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>