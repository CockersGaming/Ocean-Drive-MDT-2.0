<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <img src="{{asset('images/logo.png')}}" alt="">
            <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
            <h5 class="mb-0 fs-20 text-black "><span class="font-w400">Hello,</span> {{Auth::user()->fullname()}}</h5>
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
                        <li>
                            <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <span class="nav-text">Reports</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{route('reports.index')}}">Home</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <span class="nav-text">Warrants</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="#">Home</a></li>
                            </ul>
                        </li>
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
