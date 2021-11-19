<?php if ( ! $this->session->userdata( 'user_id' ) ): ?>
  <div class="user-login-container">
    <div class="user-login-element">
      <a href="<?php echo base_url(); ?>login"><i class="mdi mdi-login"></i> Login</a>
    </div>
  </div>
<?php endif; ?>
