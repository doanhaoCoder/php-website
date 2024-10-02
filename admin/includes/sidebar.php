<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      <h4>ADMINISTRATION</h4>
    </div>
  </div>
  <div class="menu is-menu-main">
    <p class="menu-label">General</p>
    <ul class="menu-list">
      <li class="<?php echo setActive('dashboard') ?>">
        <a href="index.php?page=dashboard">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Dashboard</span>
        </a>
      </li>
    </ul>
    <p class="menu-label">Examples</p>
    <ul class="menu-list">
      <li class="<?php echo setActive('blogs') ?>">
        <a href="index.php?page=blogs">
          <span class="icon"><i class="mdi mdi-table"></i></span>
          <span class="menu-item-label">Blogs</span>
        </a>
      </li>
      <!-- admin - mod menu  -->
      <?php
      if ($_SESSION['user_role'] >= 1) {
      ?>
        <li class="<?php echo setActive('blogcategories') ?>">
          <a href="index.php?page=blogcategories">
            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
            <span class="menu-item-label">Blog Categories</span>
          </a>
        </li>
        <li class="<?php echo setActive('subscribers') ?>">
          <a href="index.php?page=subscribers">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            <span class="menu-item-label">Subscribers</span>
          </a>
        </li>
        <li class="<?php echo setActive('comments') ?>">
          <a href="index.php?page=comments">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            <span class="menu-item-label">Comments</span>
          </a>
        </li>
        <li class="<?php echo setActive('users') ?>">
          <a href="index.php?page=users">
            <span class="icon"><i class="mdi mdi-lock"></i></span>
            <span class="menu-item-label">User</span>
          </a>
        </li>
      <?php
      }
      ?>
      <!-- admin menu  -->
      <?php
      if ($_SESSION['user_role'] == 2) {
      ?>
        <li>
          <a class="dropdown">
            <span class="icon"><i class="mdi mdi-view-list"></i></span>
            <span class="menu-item-label">Manage Webside</span>
            <span class="icon"><i class="mdi mdi-plus"></i></span>
          </a>
          <ul>
            <li class="<?php echo setActive('sliders') ?>">
              <a href="index.php?page=sliders">
                <span>Silders</span>
              </a>
            </li>
            <li class="<?php echo setActive('socials') ?>">
              <a href="index.php?page=socials">
                <span>Socials Links</span>
              </a>
            </li>
            <li class="<?php echo setActive('links') ?>">
              <a href="index.php?page=links">
                <span>Links Menu</span>
              </a>
            </li>
            <li class="<?php echo setActive('about') ?>">
              <a href="index.php?page=about">
                <span>About</span>
              </a>
            </li>
            <li class="<?php echo setActive('contact') ?>">
              <a href="index.php?page=contact">
                <span>Contact</span>
              </a>
            </li>
            <li class="<?php echo setActive('terms') ?>">
              <a href="index.php?page=terms">
                <span>Terms</span>
              </a>
            </li>
            <li class="<?php echo setActive('settings') ?>">
              <a href="index.php?page=settings">
                <span>Settings</span>
              </a>
            </li>
            <li class="<?php echo setActive('mailsettings') ?>">
              <a href="index.php?page=mailsettings">
                <span>Settings Mail</span>
              </a>
            </li>
          </ul>
        </li>
      <?php
      }
      ?>
    </ul>
  </div>
</aside>