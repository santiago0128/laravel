<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="{{ url('/') }}" class="nav_logo"><img style="width: 120px; "  src="{{ asset('images/xion.png')}}" alt="Mplify Logo" class="img-responsive logo">
            <div class="nav_list">
                <a href="{{ url('/') }}" class="nav_link active"> <i class='bx bx-grid-alt  bx-sm nav_icon'></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="{{ url('/user') }}" class="nav_link">
                    <i class='bx bx-user  bx-sm nav_icon'></i>
                    <span class="nav_name">Usuarios</span>
                </a>
                <a href="#" class="nav_link">
                    <i class='bx bx-message-square-detail  bx-sm nav_icon'></i>
                    <span  class="nav_name">Campañas</span>
                </a>
                <!-- <a href="#" class="nav_link">
                    <i class='bx bx-bookmark nav_icon'></i>
                    <span class="nav_name">Bookmark</span> 
                </a>
                <a href="#" class="nav_link">
                    <i class='bx bx-folder nav_icon'></i>
                    <span class="nav_name">Files</span>
                </a>
                <a href="#" class="nav_link">
                    <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                    <span class="nav_name">Stats</span>
                </a> -->
            </div>
        </div>
        <div>
            <a class="nav_link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar Sesion</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </nav>
</div>