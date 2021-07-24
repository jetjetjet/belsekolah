<div class="vertical-menu">
  <div data-simplebar class="h-100">
      <!--- Sidemenu -->
      <div id="sidebar-menu">
          <!-- Left Menu Start -->
          <ul class="metismenu list-unstyled" id="side-menu">

              <li>
                  <a href="index.html" class="waves-effect">
                      <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end">2</span>
                      <span>Dashboard</span>
                  </a>
              </li>

              <li class="menu-title">Master Data</li>
              <li>
                  <a href="{{ url('user') }}" class=" waves-effect">
                      <i class="ti-user"></i>
                      <span>User</span>
                  </a>
              </li>
              <li>
                  <a href="{{ url('role') }}" class=" waves-effect">
                      <i class="ti-stamp"></i>
                      <span>Peran</span>
                  </a>
              </li>
              <li>
                  <a href="{{ url('kelas') }}" class=" waves-effect">
                      <i class="ti-blackboard"></i>
                      <span>Kelas</span>
                  </a>
              </li>
              <li>
                  <a href="{{ url('guru') }}" class=" waves-effect">
                      <i class="ti-user"></i>
                      <span>Guru</span>
                  </a>
              </li>
              <li>
                  <a href="{{ url('mapel') }}" class=" waves-effect">
                      <i class="ti-book"></i>
                      <span>Mata Pelajaran</span>
                  </a>
              </li>

              <li class="menu-title">Jadwal</li>

              <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="ti-support"></i>
                      <span>  Extra Pages  </span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                      <li><a href="pages-timeline.html">Timeline</a></li>
                      <li><a href="pages-invoice.html">Invoice</a></li>
                  </ul>
              </li>

          </ul>
      </div>
      <!-- Sidebar -->
  </div>
</div>