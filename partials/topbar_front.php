<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
      <img src="image/logo.png" alt="Logo Makassar Robotics" class="brand-image img-circle elevation-0" style="opacity: .8">
        <span class="brand-text font-weight-light">DokterAlatBerat</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index3.html" class="nav-link">Jual Beli</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Service</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Sparepart</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Management</a>
          </li>
          
        </ul>
       
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <?php 
          if(isset($_SESSION['logged_user'])){
    ?>
      <li class="nav-item dropdown d-none d-sm-block">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user mr-1"></i>  <?php echo strtoupper($user_session['nickname']); ?> </a>        
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="profil.php" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/AdminLTELogo.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo $user_session['name'];?>
                  <span class="float-right text-sm text-danger"></span>
                </h3>
                <p class="text-sm"><?php echo $user_session['email'];?></p>
                <p class="text-sm text-muted"><?php echo $user_session['rolename'];?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          
          </a>
          <!-- <div class="dropdown-divider"></div>
          <a href="profil.php#password" class="dropdown-item dropdown-footer text-left"><i class="fas fa-lock mr-2"></i>Ubah Password</a> -->
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item dropdown-footer text-left"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
        </div>
      </li> 
      <?php }else{ ?>
        <li class="nav-item d-none d-sm-block">
          <a class="nav-link" href="login.php" role="button">
            <i class="fas fa-user fa-fw mr-1"></i> Login
          </a>
        </li> 
      <?php } ?>    
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> 
      </ul>
    </div>
  </nav>
  
  <!-- /.navbar -->