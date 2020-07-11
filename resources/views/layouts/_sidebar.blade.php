@guest
@if (Route::has('register'))
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../" class="brand-link">
      <p class="text-white"><i class="fa fa-question-circle fa-2x" aria-hidden="true"></i>
      <span class="brand-text font-weight-light"> &nbsp Forum Tanya-Jawab</span></p>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <p class="text-white"> <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i></p>
        </div>
        <div class="info">
          <a href="#" class="d-block">Guest</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">PERTANYAAN</li>
          <li class="nav-item">
            <a href="../question" class="nav-link">
              <i class="fa fa-list-ul" aria-hidden="true"></i>
              <p>
                &nbsp &nbsp &nbsp List Pertanyaan
              </p>
            </a>
          </li>
                
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@endif
@else
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../" class="brand-link">
      <p class="text-white"><i class="fa fa-question-circle fa-2x" aria-hidden="true"></i>
      <span class="brand-text font-weight-light"> &nbsp Forum Tanya-Jawab</span></p>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <p class="text-white"> <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i></p>
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">PERTANYAAN</li>
          <li class="nav-item">
            <a href="../question" class="nav-link">
              <i class="fa fa-list-ul" aria-hidden="true"></i>
              <p>
                &nbsp &nbsp &nbsp List Pertanyaan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../question/create" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               &nbsp Buat Pertanyaan
              </p>
            </a>
          </li>        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  @endguest
