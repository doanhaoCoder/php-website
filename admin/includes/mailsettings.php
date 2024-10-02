<?php
$mailsettings = new mailsettings($db);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mailsettings->email = $_POST['email'];
    $mailsettings->mail_server = $_POST['mail_server'];
    $mailsettings->mail_username = $_POST['mail_username'];
    $mailsettings->mail_password = $_POST['mail_password'];
    $mailsettings->mail_port = $_POST['mail_port'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $mailsettings->created_at = date('Y-m-d H:i:s', time());
    $mailsettings->updated_at = date('Y-m-d H:i:s', time());

    if ($mailsettings->readAll()->rowCount() > 0) {
        $mailsettings->id = 1;
    } else {
        $mailsettings->create();
    }
    $message = "Mail settings page updated successfully!";
}
$mailsettings->id = 1;
$mailsettings->read();
?>
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>Admin</li>
            <li>Mail settings Page</li>
        </ul>
    </div>
</section>
<section class="section main-section">
    <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title" style="font-size: 130%;">
                Edit Mail settings
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
            <form role="form" method="Post" action="index.php?page=mailsettings">
                <div class="field">

                    <label class="label">Email</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="email" value="<?php echo $mailsettings->email ?>" class="input" type="text" placeholder="">
                        </div>
                    </div>

                    <label class="label">Mail Server</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="mail_server" value="<?php echo $mailsettings->mail_server ?>" class="input" type="text" placeholder="">
                        </div>
                    </div>

                    <label class="label">Mail Username</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="mail_username" value="<?php echo $mailsettings->mail_username ?>" class="input" type="text" placeholder="">
                        </div>
                    </div>

                    <label class="label">Mail Password</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="mail_password" value="<?php echo $mailsettings->mail_password ?>" class="input" type="password" placeholder="">
                        </div>
                    </div>

                    <label class="label">Mail Port</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="mail_port" value="<?php echo $mailsettings->mail_port ?>" class="input" type="text" placeholder="">
                        </div>
                    </div>

                    <button type="submit" class="button medium blue --jb-modal">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>