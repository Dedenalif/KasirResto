<div class="deznav-scroll">
    <ul class="metismenu" id="menu">
        <li><a href="{{ route('manajer-dashboard') }}" aria-expanded="false">
                <i class="flaticon-381-networking"></i>
                <span class="nav-text">Dashboard</span>
            </a>
        </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-381-networking"></i>
                <span class="nav-text">Menu</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('makanan') }}">Makanan</a></li>
                <li><a href="{{ route('minuman') }}">Minuman</a></li>
            </ul>
        </li>
    </ul>
</div>