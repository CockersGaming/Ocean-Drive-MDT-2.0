<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <img src="{{asset('images/logo.png')}}" alt="">
            <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
            <h5 class="mb-0 fs-20 text-black "><span class="font-w400">Hello,</span> {{Auth::user()->fullname()}}</h5>
            <p class="mb-0 fs-14 font-w400">{{Auth::user()->email}}</p>
        </div>
        <ul class="metismenu" id="menu">

            @if(Auth::user()->hasRole([2]) || Auth::user()->hasRole([1]))
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-144-layout"></i>
                        <span class="nav-text">PD</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('pd.index')}}">Home</a></li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasRole([3]) || Auth::user()->hasRole([1]))
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-144-layout"></i>
                        <span class="nav-text">EMS</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('ems.index')}}">Home</a></li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasRole([4]) || Auth::user()->hasRole([1]))
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-144-layout"></i>
                        <span class="nav-text">DOJ</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('doj.index')}}">Home</a></li>
                    </ul>
                </li>
            @endif

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
