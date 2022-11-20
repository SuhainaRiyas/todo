 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
   
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
               <?php echo $_SESSION['name']; ?></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                               <form action="../logout.php" method="post">
                                    <button class="dropdown-item" name="logout">
                                       Logout 
</button>
                               </form>
                                   
                                </div>
                            </li>
    </ul>
  </nav>
  <!-- /.navbar -->


   <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Todo
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Task Lists</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="complete.php" class="nav-link">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Completed Tasks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pending.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Tasks</p>
                </a>
              </li>
            </ul>
          </li>
         
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  