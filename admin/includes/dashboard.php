<?php
$blogs = new blogs($db);
$users = new users($db);
$comments = new comments($db);
$subscribers = new subscribers($db);

?>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Dashboard</li>
    </ul>
  </div>
</section>
<div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
  <div class="card">
    <div class="card-content">
      <div class="flex items-center justify-between">
        <div class="widget-label">
          <h3>
            Blogs
          </h3>
          <h1>
            <?php echo $blogs->readAll()->rowCount() ?>
          </h1>
        </div>
        <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-content">
      <div class="flex items-center justify-between">
        <div class="widget-label">
          <h3>
            Users
          </h3>
          <h1>
            <?php echo $users->readAll()->rowCount() ?>
          </h1>
        </div>
        <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-content">
      <div class="flex items-center justify-between">
        <div class="widget-label">
          <h3>
            Comments
          </h3>
          <h1>
            <?php echo $comments->readAll()->rowCount() ?>
          </h1>
        </div>
        <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-content">
      <div class="flex items-center justify-between">
        <div class="widget-label">
          <h3>
            subscribers
          </h3>
          <h1>
            <?php echo $subscribers->readAll()->rowCount() ?>
          </h1>
        </div>
        <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
      </div>
    </div>
  </div>
</div>