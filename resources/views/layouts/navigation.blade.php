<div class="sidebar-wrapper">
  <div class="user">
    <div class="photo">
      <img src="{{ asset('plugin_new/assets/img/faces/avatar.jpg') }}" />
    </div>
    <div class="info">
      <a data-toggle="collapse" href="#collapseExample" class="collapsed">
        {{$data_user->name}}
        <b class="caret"></b>
      </a>
      <div class="collapse" id="collapseExample">
        <ul class="nav">
          <li>
            <a href="{{ url('profile') }}">My Profile</a>
          </li>
          <li>
            <a href="{{ url('profile/edit/') }}">Edit Profile</a>
          </li>
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <ul class="nav">
    <li class="active">
      <a href="{{ url('admin-dashboard') }}">
        <i class="material-icons">dashboard</i>
        <p>Dashboard</p>
      </a>
    </li>
    <li>
      <a data-toggle="collapse" href="#formsExamples">
        <i class="material-icons">content_paste</i>
        <p>Formulir
          <b class="caret"></b>
        </p>
      </a>
      <div class="collapse" id="formsExamples">
        <ul class="nav">
          <li>
            <a href="{{ url('tb06') }}">TB06 - Daftar Terduga TB</a>
          </li>
          <li>
            <a href="{{ url('tb05') }}">TB05 - Permohonan Lab</a>
          </li>
          <li>
            <a href="{{ url('tb04') }}">TB04 - Register Lab</a>
          </li>
          <li>
            <a href="{{ url('tb01') }}">TB01 - Kartu Pengobatan</a>
          </li>
<!--           <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#componentsCollapse">
                TB01 - Kartu Pengobatan
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="componentsCollapse">
              <ul class="nav">
                <li class="nav-item" style="padding-left: 20px;">
                  <a href="{{ url('tb01') }}">List</a>
                </li>
                <li class="nav-item" style="padding-left: 20px;">
                  <a href="{{ url('tb01/create') }}">Create</a>
                </li>
              </ul>
            </div>
          </li> -->
          <li>
            <a href="{{ url('tb02')}}">TB02 - Jadwal Obat & Periksa</a>
          </li>
          <li>
            <a href="{{ url('tb03')}}">TB03 - Register TBC UPK</a>
          </li>
        </ul>
      </div>
    </li>
    <li>
      <a data-toggle="collapse" href="#tablesExamples">
        <i class="material-icons">grid_on</i>
        <p>Data Master
          <b class="caret"></b>
        </p>
      </a>
      <div class="collapse" id="tablesExamples">
        <ul class="nav">
          <li>
            <a href="{{ url('pasien')}}">Data Pasien</a>
          </li>
          <li>
            <a href="tables/regular.html">Data Puskesmas</a>
          </li>
          <li>
            <a href="{{ url('user')}}">Data Pengguna</a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
</div>