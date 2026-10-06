<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ asset('admin/dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <!-- Categories -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategory"
                aria-expanded="false" aria-controls="collapseCategory">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Categorias
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url('admin/categories/create') }}">Crear Categoria</a>
                    <a class="nav-link" href="{{ url('admin/categories') }}">Ver Categoria</a>
                </nav>
            </div>
            <!-- Fin Categories -->

            <!--Marcas -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBrand"
                aria-expanded="false" aria-controls="collapseBrand">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Marcas
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>

            <div class="collapse" id="collapseBrand" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url('admin/brands/create') }}">Crear Marca</a>
                    <a class="nav-link" href="{{ url('admin/brands') }}">Ver Marca</a>
                </nav>
            </div>
            <!-- Fin Marcas -->
            <!--Producto -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProduct"
                aria-expanded="false" aria-controls="collapseProduct">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Productos
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>

            <div class="collapse" id="collapseProduct" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url('admin/products/create') }}">Crear Producto</a>
                    <a class="nav-link" href="{{ url('admin/products') }}">Ver Producto</a>
                </nav>
            </div>
            <!-- Fin Producto -->



            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Charts
            </a>
            <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Tables
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
