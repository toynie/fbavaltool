<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">DFB Valuation Tool</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexies Iglesia</a>
      </div>
    </div>
    <div class="user-panel mt-3 d-flex">

        <a href="/selectBusiness" target="_blank" class="nav-link">
            <p>
                <i class="fas fa-calculator fa-2x text-warning"  aria-hidden="true"></i>
               &nbsp Valuation Tool
            </p>
          </a>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('cms.transaction.index')}}" class="nav-link">
              <p>
                <i class="fas fa-list-alt fa-2x"></i>
                 &nbsp Transactions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('cms.bussTypes.index')}}" class="nav-link">

              <p>
                <i class="fas fa-building fa-2x"></i>
                 &nbsp Business Types
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{route('cms.bussTypes.index')}}" class="nav-link">

              <p>
                <i class="fas fa-question-circle fa-2x"></i>
                 &nbsp Question Set
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{route('cms.questions.all')}}" class="nav-link">
              <p>
                <i class="fas fa-question-circle fa-2x"></i>
                &nbsp Global Questions
              </p>
            </a>
          </li> -
          <li class="nav-item">

            <a href="/cms/free/{{$bussType}}" class="nav-link">
              <p>
                <i class="fas fa-gifts fa-2x"></i>
                 &nbsp Free Questions
              </p>
            </a>
          </li>-}}
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                <i class="far fa-check-circle fa-2x"></i>
                 &nbsp Answers
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                <i class="fas fa-list fa-2x"></i>
                 &nbsp Categories
              </p>
            </a>
          </li> --}}

          <li class="nav-item">
            <a href="{{route('cms.settings')}}" class="nav-link">
              <p>
                <i class="fas fa-wrench fa-2x"></i>
                 &nbsp Settings

              </p>
            </a>
          </li>
          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-folder"></i>
              <p>
                Sets
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('cms.sets.index')}}" class="nav-link">
                  <i class="fas fa-arrow-alt-circle-right"></i>
                  <p>All Sets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="fas fa-arrow-alt-circle-right"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li> --}}
        </ul>
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
