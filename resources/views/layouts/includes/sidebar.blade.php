<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <img src="{{ Auth::user()->char_link()->mugshot }}" alt="">
            <h5 class="mb-0 fs-20 text-black "><span class="font-w400">Hello,<br></span> {{Auth::user()->fullname()}}</h5>
        </div>
        <ul class="metismenu" id="menu">

            @if(Auth::user()->hasRole([2]))
                <li>
                    <a href="{{route('pd.index')}}" class="text-center">
                        <i class="fas fa-siren-on"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow text-left" href="javascript:void('');" aria-expanded="false">
                        <i class="fas fa-file-contract"></i>
                        <span class="nav-text">Reports</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('reports.index')}}">Home</a></li>
                        <li><a href="{{route('reports.create')}}">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow text-left" href="javascript:void('');" aria-expanded="false">
                        <i class="fas fa-search"></i>
                        <span class="nav-text">Warrants</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('warrants.index')}}">Home</a></li>
                        <li><a href="{{route('warrants.create')}}">Create</a></li>
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasRole([3]))
                <li>
                    <a class="text-left" href="{{route('ems.index')}}" aria-expanded="false">
                        <i class="fas fa-briefcase-medical"></i>
                        <span class="nav-text">EMS</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->hasRole([4]))
                <li>
                    <a class="text-left" href="{{route('doj.index')}}">
                        <i class="fas fa-gavel"></i>
                        <span class="nav-text">DOJ</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->hasRole([1]))
                <li class="text-center border-bottom pb-2">
                    PD Area
                </li>
                <li>
                    <a class="text-left" href="{{ route('pd.index') }}">
                        <i class="fas fa-siren-on"></i>
                        <span class="nav-text">Home</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow text-left" href="javascript:void('');" aria-expanded="false">
                        <i class="fas fa-file-contract"></i>
                        <span class="nav-text">Reports</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('reports.index')}}">Home</a></li>
                        <li><a href="{{route('reports.create')}}">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow text-left" href="javascript:void('');" aria-expanded="false">
                        <i class="fas fa-search"></i>
                        <span class="nav-text">Warrants</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('warrants.index')}}">Home</a></li>
                        <li><a href="{{route('warrants.create')}}">Create</a></li>
                    </ul>
                </li>
                <li class="text-center border-top border-bottom pb-2">
                    EMS Area
                </li>
                <li>
                    <a class="text-left" href="{{ route('ems.index') }}">
                        <i class="fas fa-briefcase-medical"></i>
                        <span class="nav-text">Home</span>
                    </a>
                </li>
                <li class="text-center border-top border-bottom pb-2">
                    DOJ Area
                </li>
                <li>
                    <a class="text-left" href="{{ route('doj.index') }}">
                        <i class="fas fa-gavel"></i>
                        <span class="nav-text">Home</span>
                    </a>
                </li>
                <li class="text-center border-top border-bottom pb-2">
                    Admin Area
                </li>
                <li>
                    <a class="has-arrow text-left" href="javascript:void('');" aria-expanded="false">
                        <i class="fas fa-user-shield"></i>
                        <span class="nav-text">Admin</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('users.index')}}">Users</a></li>
                        <li><a href="{{route('roles.index')}}">Roles</a></li>
                        <li><a href="{{route('permissions.index')}}">Permissions</a></li>
                        <li><a href="{{route('requests.index')}}">Requests</a></li>
                        <li><a href="{{route('charges.index')}}">Charges</a></li>
                    </ul>
                </li>
            @endif
        </ul>
        <div class="copyright">
            <p><strong>OD MDT v{{ env('APP_VERSION') }}</strong> © 2021 All Rights Reserved</p>
            <p class="fs-12">Made with <i class="fa fa-heart text-danger"></i> by <a href="https://jamescockfield.dev" target="_blank" style="text-decoration: none;">James Cockfield</a></p>
        </div>
    </div>
</div>
