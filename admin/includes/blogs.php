<?php
$blogcategories = new blogcategories($db);
$blogs = new blogs($db);

// xoa blogs post
if (!empty($_GET['id'])) {
  $blogs->id = $_GET['id'];
  $blogs->read();
  // delete image
  if ($blogs->image) {
    deleteImage($blogs->image, "../images/blogs/");
  }

  if ($blogs->delete()) {
    $message = "Deleted successfully!";
  }
}

if ($_SESSION['user_role'] == 0) {
  //doc tat ca blogs post by id_user
  $blogs->id_user = $_SESSION['user_id'];
  $stmt_categories = $blogs->readUserId();
} else {
  //doc tat ca blogs post
  $stmt_categories = $blogs->readAll();
}

?>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Blogs</li>
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
  <div class="card has-table">
    <header class="card-header">
      <p class="card-header-title">
        <a class="button medium blue --jb-modal" href="index.php?page=blogs_add">Add</a>
      </p>
      <a href="#" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-content">
      <table>
        <thead>
          <tr>
            <th class="image-cell"></th>
            <th style="text-align: center;">ID</th>
            <th style="text-align: center;">Image</th>
            <th style="text-align: center;">Blog Categroy</th>
            <th style="text-align: center;">Title</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Create Date</th>
            <th style="text-align: center;">Action</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($rows = $stmt_categories->fetch()) {
          ?>
            <tr>
              <td class="image-cell"></td>
              <td style="text-align: center;"><?php echo $rows['id'] ?></td>
              <td style="text-align: center;">
                <img style="margin: auto;width: 80px;" src="<?php echo "../images/blogs/" . $rows['image'] ?>" atl="">
              </td>
              <td style="text-align: center;">
                <?php
                $blogcategories->id = $rows['id_category'];
                $blogcategories->read();
                echo $blogcategories->title;
                ?>
              </td>

              <td style="text-align: center;"><?php echo $rows['title'] ?></td>
              <td style="text-align: center;" class="checkbox-cell">
                <label class="checkbox">
                  <input type="checkbox" <?php echo $rows['status'] ? "checked" : "" ?>>
                  <span class="check"></span>
                </label>
              </td>
              <td style="text-align: center;"><?php echo $rows['created_at'] ?></td>
              <td style="text-align: center;">
                <a href="index.php?page=blogs_edit&id=<?php echo $rows['id'] ?>" class="button small green --jb-modal" data-target="sample-modal-2" type="button">
                  <span class="icon">Edit</i></span>
                </a>
                <a href="index.php?page=blogs&id=<?php echo $rows['id'] ?>" class="button small red --jb-modal" data-target="sample-modal" type="button">
                  <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                </a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <div class="table-pagination">
        <div class="flex items-center justify-between">
          <div class="buttons">
            <button type="button" class="button active">1</button>
            <button type="button" class="button">2</button>
            <button type="button" class="button">3</button>
          </div>
          <small>Page 1 of 3</small>
        </div>
      </div>
    </div>
  </div>


</section>