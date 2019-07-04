<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-users-cog"></i>
    </div>
    <div class="sidebar-brand-text mx-3">STT NF</div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Nav Item - membuat query menu -->
      <?php
        $role_id = $this->session->userdata('role_id'); //menuimpan ke dalam variabel
        $queryMenu = "SELECT `user_menu`.`id`, `menu`
                  FROM `user_menu` JOIN `user_access_menu`
                  ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                  WHERE `user_access_menu`.`role_id` = $role_id
                  ORDER BY `user_access_menu`.`menu_id` ASC
                  ";
        $menu = $this->db->query($queryMenu)->result_array(); //memanggil query nya
        ?>
      <!-- Looping menu -->
    <?php foreach ($menu as $m) : ?>
      <div class="sidebar-heading">
				<?= $m['menu']; ?>
			</div>
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
					aria-controls="collapseTwo">
					<i class="fas fa-fw fa-cog"></i>
					<span><?= $m['menu']; ?></span>
        </a>
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT * 
                          FROM `user_sub_menu` JOIN  `user_menu`
                          ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                          WHERE `user_sub_menu`.`menu_id` = $menuId
                          AND `user_sub_menu`.`is_active` = 1
                          ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>
        <?php foreach ($subMenu as $sm) : ?>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url($sm['url']); ?>">
          <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span>
          </a>
					</div>
        </div>
          <?php endforeach; ?>
      </li>
        <!-- Divider -->
        <hr class="sidebar-divider mt-3">
      <?php endforeach; ?>




  <!-- Divider -->
  <!-- <hr class="sidebar-divider"> -->
    <!-- Membuat QUERY MENU -->
    <?php
    $role_id = $this->session->userdata('role_id'); //menuimpan ke dalam variabel
    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                  FROM `user_menu` JOIN `user_access_menu`
                  ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                  WHERE `user_access_menu`.`role_id` = $role_id
                  ORDER BY `user_access_menu`.`menu_id` ASC
                  ";
    $menu = $this->db->query($queryMenu)->result_array(); //memanggil query nya
    ?>
    <!-- Looping menu -->
    <?php foreach ($menu as $m) : ?>
    <div class="sidebar-heading">
      <?= $m['menu']; ?>
    </div>

      <!-- SIAPKAN SUB-MENU SESUAI MENU FORENT KEY DUA TEBEL -->

      <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT * 
                          FROM `user_sub_menu` JOIN  `user_menu`
                          ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                          WHERE `user_sub_menu`.`menu_id` = $menuId
                          AND `user_sub_menu`.`is_active` = 1
                          ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <!-- MANAJEMEN DI BAGIAN SUB MENU -->
        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
            <li class="nav-item active">
                <?php else : ?>
            <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
            </li>
            <?php endforeach; ?>
        <!-- Divider -->
        <hr class="sidebar-divider mt-3">
      <?php endforeach; ?>

        <!-- Nav Item - Profile -->
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->