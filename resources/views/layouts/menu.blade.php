

<li class="nav-item">
    <a href="{{ route('locals.index') }}"
       class="nav-link {{ Request::is('locals*') ? 'active' : '' }}">
        <p>Locals</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cartas.index') }}"
       class="nav-link {{ Request::is('cartas*') ? 'active' : '' }}">
        <p>Cartas</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('productos.index') }}"
       class="nav-link {{ Request::is('productos*') ? 'active' : '' }}">
        <p>Productos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('categoriaProductos.index') }}"
       class="nav-link {{ Request::is('categoriaProductos*') ? 'active' : '' }}">
        <p>Categoria Productos</p>
    </a>
</li>


