<x-layout>
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">

            <!-- Navbar -->
            @include('partials._navbar')

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="/dashboard" class="brand-link">
                    <span class="brand-text font-weight-light">Company admin</span>
                </a>
                @include('partials._sidebarMenu')
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        {{ $slot }}
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

        </div>
    </div>
</x-layout>
