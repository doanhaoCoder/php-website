<?php
$comments = new comments($db);

// xoa comments
if (!empty($_GET['id'])) {
  $comments->id = $_GET['id'];
  if ($comments->delete()) {
    $message = "Deleted successfully!";
  }
}

//doc tat ca comments
$stmt_categories = $comments->readAll();
?>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Comments</li>
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

      <a href="#" class="card-header-icon">
        <span class="icon"><i class="mdi mdi-reload"></i></span>
      </a>
    </header>
    <div class="card-content">
      <table>
        <thead>
          <tr>
            <th class="image-cell"></th>
            <th>ID</th>
            <th>Comment</th>
            <th>ID Parent Comment</th>
            <th>ID Blog</th>
            <th>Email</th>
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
              <td><?php echo $rows['id'] ?></td>
              <td><?php echo $rows['comment'] ?></td>
              <td><?php echo $rows['id_parent_comment'] ?></td>
              <td><?php echo $rows['id_blog'] ?></td>
              <td><?php echo $rows['email'] ?></td>
              <td style="text-align: center;"><?php echo $rows['created_at'] ?></td>
              <td style="text-align: center;">
                <a href="index.php?page=comments&id=<?php echo $rows['id'] ?>" class="button small red --jb-modal" data-target="sample-modal" type="button">
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