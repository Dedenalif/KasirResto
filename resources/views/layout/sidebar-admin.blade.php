<div class="deznav-scroll">
    <ul class="metismenu" id="menu">
        <li><a class="has-arrow ai-icon" href="{{ route('admin-dashboard') }}" aria-expanded="false">
                <i class="flaticon-381-networking"></i>
                <span class="nav-text">Dashboard</span>
            </a>
        </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-381-networking"></i>
                <span class="nav-text">User</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('admin-manajer') }}">Manajer</a></li>
                <li><a href="{{ route('admin-kasir') }}">Kasir</a></li>
            </ul>
        </li>
    </ul>
</div>
