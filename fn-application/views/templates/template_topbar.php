<!-- start container scroller -->
<div class="container-scroller auth theme-one">
  <!-- start form wrapper -->
  <div class="auto-form-wrapper">
    <!-- start topbar -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row shadow-sm">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center pt-2">
        <a href="<?php echo base_url(); ?>" class="navbar-brand brand-logo text-success" style="color: #000; letter-spacing: 12px; font-weight: 600;">ERES WEB</a>
        <a href="<?php echo base_url(); ?>" class="navbar-brand brand-logo-mini text-success" style="color: #000; letter-spacing: 0px; font-weight: 600;">ERS</a>
      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        
        <form class="ml-auto search-form d-none d-md-block" action="#">
          <div class="form-group m-0">
            <input type="text" name="search-field" onmouseover="this.focus();" id="search-field" class="form-control" placeholder="Search by Year, Instructor or Department" style="width: 50vw">
            <div id="search-results" style="width: 50vw;"></div> 
          </div>
        </form>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown d-none d-xl-inline-flex">
            <a class="nav-link dropdown-toggle pl-4 d-flex align-items-center" id="UserDropdown" href="#"
              data-toggle="dropdown" aria-expanded="false">
              <div class="count-indicator d-inline-flex mr-3">
                <img class="img-xs rounded-circle" src="<?php echo base_url(); ?>fn-uploads/profiles/<?php echo $this->session->userdata('user_photo'); ?>" alt="Profile image">
                <span class="count count-sm bg-inverse-primary"></span>
              </div>
              <span class="profile-text font-weight-medium"><?php echo ucwords( $this->session->userdata( 'user_name' ) ); ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a href="<?php echo base_url() . 'users/edit/?id='. $this->session->userdata( 'user_id' ); ?>" class="dropdown-item mt-3"> Update Profile </a>
              <a href="<?php echo base_url() . 'users/edit/?id='. $this->session->userdata( 'user_id' ); ?>" class="dropdown-item"> Change Password </a>
              <a href="<?php echo base_url(); ?>login/signout" class="dropdown-item"> Sign Out </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>

      
    </nav>
    <!-- end topbar -->

    <!-- start page body wrapper -->
    <div class="container-fluid page-body-wrapper">
    