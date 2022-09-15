<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/home">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Pages</li>
            <li class="@if(Route::current()->uri == '/') active @endif">
                <a class="nav-link" href="/"><i class="fa fa-address-book"></i>
                    <span>Biodata</span>
                </a>
            </li>
            <li class="@if(Route::current()->uri == '/regAll') active @endif">
                <a class="nav-link" href="/regAll"><i class="fa fa-address-card"></i>
                    <span>Register</span>
                </a>
            </li>
            </ul>
            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" target="_blank" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
            </div>
        </aside>
</div>
