@php
    use Illuminate\Support\Facades\Auth;

$user=Auth::user();
if($user!==null){
    $dashboardRoute=$user->getRedirectRoute() ;
}

@endphp

<nav 
class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link active" href="/" aria-current="page"
            >Home <span class="visually-hidden">(current)</span></a
        >
        
        <a class="nav-item nav-link" href="{{route('products.index')}}">Product</a>
     
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
           
                <a href="{{route($dashboardRoute)}}" 
                class=" nav-item nav-link">Dashboard</a>
                <a href="{{route('logout')}}" 
                class=" nav-item nav-link">Logout</a>
                @else
            <a href="{{ route('login') }}" 
            class=" nav-item nav-link">Login</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" 
                class=" nav-item nav-link">Register</a>
                    
                @endif
            @endauth
        </div>
  

        
    </div>
</nav>
