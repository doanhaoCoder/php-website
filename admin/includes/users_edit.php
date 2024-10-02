<?php
$users = new users($db);

if ($_GET['id']) {
    $users->id = $_GET['id'];
    $users->read();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users->name = $_POST['name'];
    $users->username = $_POST['username'];
    $users->password = sha1($_POST['password']);
    $users->phone = $_POST['phone'];
    $users->email = $_POST['email'];
    $users->role = $_POST['role'];
    $users->status = $_POST['status'] ? 1 : 0;
    $users->email_verified = "verified";

    if (!empty($_FILES["image"]["name"])) {
        if ($users->image) {
            $upload_file_name = updateImage($_FILES["image"], $users->image, "../images/users/");
        } else {
            $upload_file_name = uploadImage($_FILES["image"], "../images/users/");
        }
        $users->image = $upload_file_name;
    }

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $users->updated_at = date('Y-m-d H:i:s', time());

    if ($users->update()) {
        $message = "User updated successfully";
    }
}
?>
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>Admin</li>
            <li>User</li>
        </ul>
    </div>
</section>
<section class="section main-section">
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
    <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title" style="font-size: 130%;">
                Edit User
            </p>
        </header>

        <div class="card-content">
            <form role="form" method="Post" action="index.php?page=users_edit&id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="name" class="input" type="text" placeholder="" value="<?php echo $users->name ?>">
                        </div>
                    </div>
                    <label class="label">Username</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="username" class="input" type="text" placeholder="" value="<?php echo $users->username ?>">
                        </div>
                    </div>
                    <label class="label">Password</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="password" class="input" type="password" placeholder="" value="<?php echo $users->password ?>">
                        </div>
                    </div>
                    <label class="label">Phone</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="phone" class="input" type="text" placeholder="" value="<?php echo $users->phone ?>">
                        </div>
                    </div>
                    <label class="label">Email</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="email" class="input" type="text" placeholder="" value="<?php echo $users->email ?>">
                        </div>
                    </div>
                    <label class="label">role</label>
                    <div class="control">
                        <div class="select">
                            <select name="role">
                                <option value="0" <?php echo $users->role == 0 ? "selected" : "" ?>>User</option>
                                <option value="1" <?php echo $users->role == 1 ? "selected" : "" ?>>Mod</option>
                                <option value="2" <?php echo $users->role == 2 ? "selected" : "" ?>>Admin</option>
                            </select>
                        </div>
                    </div>
                    <?php
                    if ($users->image) {
                    ?>
                        <div>
                            <img src="<?php echo "../images/users/" . $users->image ?>" alt="" width="100px">
                        </div>
                    <?php
                    }
                    ?>
                    <label class="label">Image</label>
                    <div class="field-body">
                        <div class="field" style="margin-bottom: 10px">
                            <input name="image" class="input" type="file">
                        </div>
                    </div>
                    <div>
                        <label>Status</label>
                        <input type="checkbox" name="status" <?php echo $users->status ? "checked" : "" ?>>
                    </div>
                    <button type="submit" class="button medium blue --jb-modal">Submit</button>
                </div>
        </div>
        </form>
    </div>
    </div>
</section>