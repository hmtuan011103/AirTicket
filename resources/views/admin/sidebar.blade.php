<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                AIR TICKET
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('flight-route.index') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Flight Route</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('airlines.index') }}">
                    <i class="nc-icon nc-planet"></i>
                    <p>Airlines</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{ route('planes.index') }}>
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Planes</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('flights.index') }}">
                    <i class="nc-icon nc-atom"></i>
                    <p>Flights</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tickets.index') }}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>Tickets</p>
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('admin-auth.destroy', auth()->guard('admin')->user()) }}" method="POST" class="nav-link" style="cursor: pointer">
                    @csrf
                    @method('DELETE')
                    <i class="nc-icon nc-bell-55"></i>
                    <button id="btn-logout" class="d-none">Logout</button>
                    <label for="btn-logout" style="cursor: pointer">
                        <p>Logout</p>
                    </label>
                </form>

            </li>
        </ul>
    </div>
</div>
