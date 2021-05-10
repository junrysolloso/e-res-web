<!-- start sidebar -->
<nav class="sidebar sidebar-offcanvas shadow-sm" id="sidebar">
  <ul class="nav">
    <?php if ( $this->session->userdata( 'user_role' ) === 'administrator' ):?>
      <li class="nav-item" id="dashboard">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
          <i class="menu-icon mdi mdi-speedometer"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
    <?php endif; ?>
    <li class="nav-item" id="studies">
      <a class="nav-link" href="<?php echo base_url(); ?>studies">
        <i class="menu-icon mdi mdi-book-outline"></i>
        <span class="menu-title">Studies</span>
      </a>
    </li>
    <?php if ( $this->session->userdata( 'user_role' ) === 'administrator' ):?>
      <li class="nav-item" id="advisers">
        <a class="nav-link" href="<?php echo base_url(); ?>advisers">
          <i class="menu-icon mdi mdi-teach"></i>
          <span class="menu-title">Advisers</span>
        </a>
      </li>
      <li class="nav-item" id="categories">
        <a class="nav-link" href="<?php echo base_url(); ?>categories">
          <i class="menu-icon mdi mdi-file-tree"></i>
          <span class="menu-title">Departments</span>
        </a>
      </li>
      <li class="nav-item" id="users">
        <a class="nav-link" data-toggle="collapse" href="#users-dropdown" aria-expanded="false" aria-controls="users-dropdown">
          <i class="menu-icon mdi mdi-account-key-outline"></i>
          <span class="menu-title">Users</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="users-dropdown">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link"  href="<?php echo base_url(); ?>users">Users List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="<?php echo base_url(); ?>users/add">Add User</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item" id="settings">
        <a class="nav-link" data-toggle="collapse" href="#settings-dropdown" aria-expanded="false" aria-controls="settings-dropdown">
          <i class="menu-icon mdi mdi-settings-outline"></i>
          <span class="menu-title">Settings</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="settings-dropdown">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link"  href="#" id="db-backup">DB Backup</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="<?php echo base_url(); ?>logs">System logs</a>
            </li>
          </ul>
        </div>
      </li>
    <?php endif; ?>
  </ul>
</nav>
<!-- end sidebar -->

<!-- start main panel -->
<div class="main-panel">
  
  <!-- start content wrapper -->
  <div class="content-wrapper">
    <div class="content-header d-flex flex-column flex-md-row">

      <!-- bredcrumb -->
      <?php
        $f_segment = ''; $s_segment = ''; $lbl = '';
        $url = current_url();
        $url = explode( '/', $url );
        if ( isset( $url[4] ) ) {
          $f_segment = $url[4];
          if ( $f_segment == 'categories' ) {
            $f_segment = 'departments';
          } 
        }

        if ( isset( $url[5] ) ) {
          $s_segment = $url[5];
          if ( $s_segment == 'beauty-products' ) {
            $s_segment = 'Beauty Products';
          } else if ( $s_segment == 'out-of-stocks' ) {
            $s_segment = 'Almost Out Of Stocks';
          }
        }
      ?>

      <h4 class="mb-0 pt-2" id="breadcrumb"><?php echo ucwords( $f_segment ); ?> <span class="mdi mdi-menu-right"></span> <?php echo ucwords( $s_segment ); ?></h4>
      <div class="wrapper ml-0 ml-md-auto my-auto d-flex align-items-center pt-4 pt-md-0">
        <a href="<?php echo base_url(); ?>studies/add" class="btn btn-success btn-sm ml-auto"><i class="mdi mdi-plus"></i> New Study</a>
      </div>
    </div>
    