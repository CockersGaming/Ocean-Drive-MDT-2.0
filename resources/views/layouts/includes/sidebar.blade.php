<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <img src="{{asset('images/logo.png')}}" alt="">
            <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
            <h5 class="mb-0 fs-20 text-black "><span class="font-w400">Hello,</span> {{Auth::user()->name}}</h5>
            <p class="mb-0 fs-14 font-w400">{{Auth::user()->email}}</p>
        </div>
        <ul class="metismenu" id="menu">
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                </ul>
            </li>
            @if(Auth::user()->hasRole([1]))
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Admin</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('users.index')}}">Users</a></li>
                        <li><a href="{{route('roles.index')}}">Roles</a></li>
                        <li><a href="{{route('permissions.index')}}">Permissions</a></li>
                        <li><a href="{{route('requests.index')}}">Requests</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
