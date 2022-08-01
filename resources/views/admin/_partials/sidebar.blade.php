<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;height:100vh">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fa fa-cogs"></span>
        &nbsp;
        <span class="fs-4 pl-2"> Administration</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item my-1">
            <a href="{{route('admin')}}" @class(["nav-link my-1 text-white","active"=>Route::is('admin')]) @if(Route::is("admin")) aria-current="page" @endif>
                <span class="fa fa-home mx-2"></span>
                Dashboard
            </a>
        </li>
        <li class="nav-item my-1">
            <a href="{{route('admin.lapins.index')}}" @class(["nav-link  text-white my-1","active"=>Route::is('admin.lapins.*')]) @if(Route::is("admin.lapins.index")) aria-current="page" @endif>
                <span class="fa fa-cog mx-2"></span>
                Lapins
            </a>
        </li>
        <li class="nav-item my-1">
            <a href="{{route('admin.chiens.index')}}" @class(["nav-link  text-white my-1","active"=>Route::is('admin.chiens.*')]) @if(Route::is("admin.chiens.index")) aria-current="page" @endif>
                <span class="fa fa-eyedropper mx-2"></span>
                Chiens
            </a>
        </li>
        <li class="nav-item my-1">
            <a href="{{route('admin.cailles.index')}}" @class(["nav-link  text-white my-1","active"=>Route::is('admin.cailles.*')]) @if(Route::is("admin.cailles.index")) aria-current="page" @endif>
                <span class="fa fa-flash mx-2"></span>
                Cailles
            </a>
        </li>
        <li class="nav-item my-1" >
            <a href="{{route('admin.cochons.index')}}" @class(["nav-link  text-white my-1","active"=>Route::is('admin.cochons.*')]) @if(Route::is("admin.lapins.index")) aria-current="page" @endif>
                <span class="fa fa-bug mx-2"></span>
                Cochons D'indes
            </a>
        </li>
        <li class="nav-item my-1">
            <a href="{{route('admin.formations.index')}}" @class(["nav-link  text-white my-1","active"=>Route::is('admin.formations.*')]) @if(Route::is("admin.lapins.index")) aria-current="page" @endif>
                <span class="fa fa-file-movie-o mx-2"></span>
                Formations
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong> {{ auth()->user()->name }} </strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            {{-- <li><a class="dropdown-item" href="#">New project...</a></li> --}}
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>
