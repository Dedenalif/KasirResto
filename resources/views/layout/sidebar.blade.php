@role('admin')
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('admin-dashboard') }}" aria-expanded="false">
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
            <li><a href="{{ route('admin-log') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Log Aktifitas</span>
                </a>
            </li>
        </ul>
    </div>
@endrole

@role('kasir')
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('pesanan') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Pesanan</span>
                </a>
            </li>
            <li><a href="{{ route('kasir-catatan') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Catatan</span>
                </a>
            </li>
        </ul>
    </div>
@endrole

@role('manajer')
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
            <li><a href="{{ route('manajer-catatan') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Catatan</span>
                </a>
            </li>
            <li><a href="{{ route('manajer-pendapatan') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Pendapatan</span>
                </a>
            </li>
            <li><a href="{{ route('manajer-log') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Log Aktifitas</span>
                </a>
            </li>
        </ul>
    </div>
@endrole
