<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ 'physiolung' }}">
                <i class="fas fa-heart"></i>
                <span class="menu-title">Physio Lung</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="fas fa-lungs"></i>
                <span class="menu-title">Xlung</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-link"> <a class="nav-link" href="{{ route("xlung-vcv") }}">VCV</a></li>
                    <li class="nav-link"> <a class="nav-link" href="{{ route("xlung-pcv") }}">PCV</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ 'psv' }}">
                <i class="fas fa-heart-broken"></i>
                <span class="menu-title">PSV</span>
            </a>
        </li>
        @section('sidebar')@show
    </ul>
</nav>
