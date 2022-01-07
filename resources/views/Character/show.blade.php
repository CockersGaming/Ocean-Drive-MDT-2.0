@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-9 col-xxl-8">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-xxl-12">
                    <div class="card">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4">
            <div class="row">
                <div class="col-xl-12 col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h4 class="mb-0 text-black fs-20">My Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="my-profile">
                                    <img src="{{asset('images/profile/port.jpg')}}" alt="" class="rounded">
                                    <a href="javascript:void(0);">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <h4 class="mt-3 font-w600 text-black mb-0 name-text">{{$char->name}}</h4>
                                <span>CID: {{$char->citizenid}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h4 class="mb-0 text-black fs-20">Current Graph</h4>
                            <div class="dropdown custom-dropdown mb-0 tbl-orders-style">
                                <div class="btn sharp tp-btn" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.0049 13C12.5572 13 13.0049 12.5523 13.0049 12C13.0049 11.4477 12.5572 11 12.0049 11C11.4526 11 11.0049 11.4477 11.0049 12C11.0049 12.5523 11.4526 13 12.0049 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12.0049 6C12.5572 6 13.0049 5.55228 13.0049 5C13.0049 4.44772 12.5572 4 12.0049 4C11.4526 4 11.0049 4.44772 11.0049 5C11.0049 5.55228 11.4526 6 12.0049 6Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12.0049 20C12.5572 20 13.0049 19.5523 13.0049 19C13.0049 18.4477 12.5572 18 12.0049 18C11.4526 18 11.0049 18.4477 11.0049 19C11.0049 19.5523 11.4526 20 12.0049 20Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                    <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div id="pieChart" class="d-inline-block"></div>
                            <div class="chart-items">
                                <div class=" col-xl-12 col-sm-12">
                                    <div class="row text-black text-left fs-13 mt-4">
													<span class="mb-3 col-6">
														<svg class="mr-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect width="19" height="19" rx="9.5" fill="#00ADA3"/>
														</svg>
														Ethereum
													</span>
                                        <span class="mb-3 col-6">
														<svg class="mr-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect width="19" height="19" rx="9.5" fill="#374B96"/>
														</svg>
														Litecoin
													</span>
                                        <span class="mb-3 col-6">
														<svg class="mr-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect width="19" height="19" rx="9.5" fill="#FF782C"/>
														</svg>
														Monero
													</span>
                                        <span class="mb-3 col-6">
														<svg class="mr-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect width="19" height="19" rx="9.5" fill="#F7A62C"/>
														</svg>
														Bitcoin
													</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
