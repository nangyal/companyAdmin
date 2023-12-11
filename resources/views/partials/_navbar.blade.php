<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            @include('components.language-switch')
        </li>
        <li class="nav-item">
            &nbsp;&nbsp;&nbsp;
        </li>
        <li class="nav-item">
            <a href="/logout" class="card-link">
                {{ __('messages.Logout') }}
            </a>
        </li>
    </ul>
</nav>
