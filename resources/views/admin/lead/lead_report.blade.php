@extends('admin.layouts.app')
@section('title', 'Lead')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="a30 p-0 ms-1 a28 row mt-3">
                <div class="col-md-3 col-4 mt-3">
                    <a href="" class="btn btn-success text-white btn-md" data-bs-toggle="modal"
                        data-bs-target="#ManageLead">
                        <i class="fa fa-plus a44" aria-hidden="true"></i>Lead
                    </a>
                </div>
                <div class="col-md-4 col-8 mt-3">
                    <span> <a href="uploadbulklead.html" class="btn btn-success a44">Upload Bulk
                            Lead</a></span>
                </div>
                <div class="col-md-3 col-8 mt-3">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default a32 dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa fa-bar-chart a44" aria-hidden="true"> </i> Pipeline
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:void(0);">Pipeline</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">New Pipeline</a></li>
                            <!-- <li><a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-eye"></i> Pipeline Visiblity</a></li> -->
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);">
                                    <i class="fas fa-grip-lines"></i> Reorder pipelines
                                </a>
                            </li>

                            <li><a class="dropdown-item disabled" href="javascript:void(0);"><i class="fa fa-pencil"></i>
                                    Customize Deal Cards</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="pipeline.html"><i class="fa fa-plus"></i>
                                    New Pipeline</a></li>
                        </ul>
                        <a href="pipeline.html" class="btn btn-defult a32"><i class="fa fa-pencil"></i></a>

                    </div>
                </div>
                <!-- MODAL RELETED -->

                <div class="col-md-2 col-4 mt-3">
                    <div class="modal fade modal-md" id="exampleModalToggle" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <label for="nameWithTitle" class="form-label">Search:</label>
                                    <input type="search" class="form-control" placeholder="Search Owner or filter">
                                    <br>
                                </div>
                                <div class="modal-body">
                                    <!-- <div class="nav-align-top mb-4"> -->


                                    <ul class="nav nav-tabs nav-fill" role="tablist">
                                        <li class="nav-item dropdown-item" href="#">
                                            <button type="button" class="nav-link active" role="tab"
                                                data-bs-toggle="tab" data-bs-target="#navs-justified-home"
                                                aria-controls="navs-justified-home" aria-selected="true">
                                                <i class="fa fa-star"></i> Favorites
                                            </button>
                                        </li>
                                        <li class="nav-item dropdown-item" href="#">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-justified-profile"
                                                aria-controls="navs-justified-profile" aria-selected="false">
                                                <i class="tf-icons ti ti-user ti-xs me-1"></i> Owners
                                            </button>
                                        </li>
                                        <li class="nav-item dropdown-item" href="#">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-justified-messages"
                                                aria-controls="navs-justified-messages" aria-selected="false">
                                                <i class="fa fa-network-wired"></i> Filters
                                            </button>
                                        </li>
                                    </ul>




                                    <div class="tab-content">

                                        <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                                            <p class="a35">
                                                Mark an owner or filter as favorite to make it appear here.
                                            </p>
                                            <p class="a36">
                                                OWNERS
                                            </p>
                                            <div class="col-md-12 row">
                                                <div class="col-md-1 col-2">
                                                    <button type="button" class="bg-light a32 a37"><i
                                                            class="fa fa-user text-dark"></i></button>
                                                </div>
                                                <div class="col-md-4 col-5">
                                                    <span>jiten patel(you)</span>
                                                </div>
                                                <div class="col-md-6 col-4"></div>
                                                <div class="col-md-1 col-1">
                                                    <i class="text-warning fa fa-star"></i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-1 col-1">
                                                    <i class="fa fa-plus text-primary cursor-pointer"></i>
                                                </div>
                                                <div class="col-md-11 col-11">
                                                    <p class="text-primary cursor-pointer">
                                                        <a href="addnewuser.html" data-bs-target="#exampleModalToggle2"
                                                            data-bs-toggle="modal">Add new filter</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                                            <p class="a36">
                                                OWNERS
                                            </p>
                                            <div class="col-md-12 row">
                                                <div class="col-md-1 col-2">
                                                    <button type="button" class="bg-light a32 a37"><i
                                                            class="fa fa-user text-dark"></i></button>
                                                </div>
                                                <div class="col-md-4 col-5">
                                                    <span>jiten patel(you)</span>
                                                </div>
                                                <div class="col-md-6 col-4"></div>
                                                <div class="col-md-1 col-1">
                                                    <i class="text-warning fa fa-star"></i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-1 col-1">
                                                    <i class="fa fa-plus text-primary cursor-pointer"></i>
                                                </div>
                                                <div class="col-md-11 col-11">
                                                    <p class="text-primary cursor-pointer">
                                                        <a href="addnewuser.html" data-bs-target="#exampleModalToggle2"
                                                            data-bs-toggle="modal">Add new filter</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                                            <div class="row col-md-12">
                                                <div class="col-md-1 col-1"></div>
                                                <div class="col-md-8 col-6"><a href="Leadreport.html"
                                                        class="text-dark">All deleted lead</a></div>
                                                <div class="col-md-1 col-1">
                                                    <a href=""><i class="fa fa-star text-primary"></i></a>
                                                </div>
                                                <div class="col-md-2 col-1">
                                                    <a href=""><i class="fa fa-pencil text-primary"></i></a>
                                                </div>

                                            </div>
                                            <br>


                                            <div class="row col-md-12">
                                                <div class="col-md-1 col-1"></div>
                                                <div class="col-md-8 col-6"><a href="Leadreport.html"
                                                        class="text-dark">All lost lead</a></div>
                                                <div class="col-md-1 col-1">
                                                    <a href=""><i class="fa fa-star text-primary"></i></a>
                                                </div>
                                                <div class="col-md-2 col-1">
                                                    <a href=""><i class="fa fa-pencil text-primary"></i></a>
                                                </div>
                                            </div>
                                            <br>




                                            <div class="row col-md-12">
                                                <div class="col-md-1 col-1"></div>
                                                <div class="col-md-8 col-6"><a href="Leadreport.html"
                                                        class="text-dark">All won lead</a></div>
                                                <div class="col-md-1 col-1">
                                                    <a href=""><i class="fa fa-star text-primary"></i></a>
                                                </div>
                                                <div class="col-md-2 col-1">
                                                    <a href=""><i class="fa fa-pencil text-primary"></i></a>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row col-md-12">
                                                <div class="col-md-1 col-1"></div>
                                                <div class="col-md-8 col-6"><a href="Leadreport.html"
                                                        class="text-dark">Move/Convert lead</a></div>
                                                <div class="col-md-1 col-1">
                                                    <a href=""><i class="fa fa-star text-primary"></i></a>
                                                </div>
                                                <div class="col-md-2 col-1">
                                                    <a href=""><i class="fa fa-pencil text-primary"></i></a>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row col-md-12">
                                                <div class="col-md-1 col-1"></div>
                                                <div class="col-md-8 col-6"><a href="userlead.html"
                                                        class="text-dark">Open lead</a></div>
                                                <div class="col-md-1 col-1">
                                                    <a href=""><i class="fa fa-star text-primary"></i></a>
                                                </div>
                                                <div class="col-md-2 col-1">
                                                    <a href=""><i class="fa fa-pencil text-primary"></i></a>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row col-md-12">
                                                <div class="col-md-1 col-1"></div>
                                                <div class="col-md-8 col-6"><a href="userlead.html"
                                                        class="text-dark">Close lead</a></div>
                                                <div class="col-md-1 col-1">
                                                    <a href=""><i class="fa fa-star text-primary"></i></a>
                                                </div>
                                                <div class="col-md-2 col-1">
                                                    <a href=""><i class="fa fa-pencil text-primary"></i></a>
                                                </div>
                                            </div>





                                            <hr>
                                            <div class="row">
                                                <div class="col-md-1 col-1">
                                                    <i class="fa fa-plus text-primary cursor-pointer"></i>
                                                </div>
                                                <div class="col-md-11 col-11">
                                                    <p class="text-primary cursor-pointer">
                                                        <a href="addnewuser.html" data-bs-target="#exampleModalToggle2"
                                                            data-bs-toggle="modal">Add new filter</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                    <!-- </div> -->
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="modal fade modal-lg" id="exampleModalToggle2" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fs-5" id="exampleModalToggleLabel2">Create new
                                        filter</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form class="form-repeater">
                                        <div data-repeater-list="group-a">
                                            <div data-repeater-item>
                                                <div class="row">
                                                    <p>Show deals that match ALL of these conditions:</p>
                                                    <div class="mb-3 col-lg-6 col-xl-3 col-6 mb-0">
                                                        <select name="" id="" class="form-control">
                                                            <option value="" class="active">Deal</option>
                                                            <option value="">Organization</option>
                                                            <option value="">person</option>
                                                            <option value="">Product</option>
                                                            <option value="">Activity</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3 col-lg-6 col-xl-3 col-6 mb-0">
                                                        <select name="" id="" class="form-control">
                                                            <option value="" class="active">Select Field
                                                            </option>
                                                            <option value="">Service</option>
                                                            <option value="">Banking</option>
                                                            <option value="">Finance</option>
                                                            <option value="">Real Estate</option>
                                                            <option value="">Menufechar</option>
                                                        </select>
                                                    </div>

                                                    <div
                                                        class="mb-3  col-lg-6 col-xl-2 col-6 d-flex align-items-center mb-0">
                                                        <button class="btn btn-label-danger" data-repeater-delete>
                                                            <i class="ti ti-x ti-xs me-1"></i>
                                                            <span class="align-middle">Ramove</span>
                                                        </button>
                                                    </div>


                                                    <div
                                                        class="mb-3  col-lg-6 col-xl-2 col-6 d-flex align-items-center mb-0">
                                                        <button class="btn btn-primary" data-repeater-create>
                                                            <i class="ti ti-plus me-1"></i>
                                                            <span class="align-middle">Add</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr />
                                            </div>
                                        </div>
                                    </form>



                                    <form>
                                        <div data-repeater-list="group-a">
                                            <div data-repeater-item>
                                                <div class="row">
                                                    <p>And match ANY of these conditions:</p>
                                                    <div class="mb-3 col-lg-6 col-xl-3 col-6 mb-0">
                                                        <select name="" id="" class="form-control">
                                                            <option value="" class="active">Deal</option>
                                                            <option value="">Organization</option>
                                                            <option value="">person</option>
                                                            <option value="">Product</option>
                                                            <option value="">Activity</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3 col-lg-6 col-xl-3 col-6 mb-0">
                                                        <select name="" id="" class="form-control">
                                                            <option value="" class="active">Select Field
                                                            </option>
                                                            <option value="">Service</option>
                                                            <option value="">Banking</option>
                                                            <option value="">Finance</option>
                                                            <option value="">Real Estate</option>
                                                            <option value="">Menufechar</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr />
                                            </div>
                                        </div>
                                    </form>


                                    <form class="form-repeater">
                                        <div data-repeater-list="group-a">
                                            <div data-repeater-item>
                                                <div class="row">
                                                    <div class="mb-3 col-lg-6 col-xl-6 col-12 mb-0">
                                                        <label for="">Filter name:</label>
                                                        <input type="text" placeholder="Filter title"
                                                            class="form-control">
                                                    </div>

                                                    <div class="mb-3 col-lg-6 col-xl-6 col-12 mb-0">
                                                        <label for="">Visibility:</label>
                                                        <select name="" id="" class="form-control">
                                                            <option value="" class="active">
                                                                Privet(only the creator can see this filter)
                                                            </option>
                                                            <option value="" class="active">
                                                                Shared(All users in the compnay can see and
                                                                use this filter)
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- <hr/> -->
                                            </div>
                                        </div>
                                    </form>
                                    <form class="form-repeater">
                                        <div data-repeater-list="group-a">
                                            <div data-repeater-item>
                                                <div class="row">
                                                    <div class="col-md-1 col-1 float-left">
                                                        <input type="checkbox">
                                                    </div>
                                                    <div class="col-md-11 col-11 float-left">
                                                        <p>Save selected columns with the filter</p>
                                                    </div>

                                                </div>
                                                <!-- <hr/> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-default" data-bs-target="#exampleModalToggle"
                                        data-bs-toggle="modal">Preview</button>

                                    <button class="btn btn-success" data-bs-target="#exampleModalToggle"
                                        data-bs-toggle="modal">save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-default a32" data-bs-toggle="modal" href="#exampleModalToggle" role="button"> <i
                            class="fa fa-network-wired" aria-hidden="true"></i>Everyone</a>
                </div>
                <!-- MODAL RELETED -->
                <div class="row">
                    <div class="col-md-9 col-5 mt-3"></div>
                    <div class="col-md-3  col-7 mt-3">
                        <select name="" id="" class="form-control">
                            <option><a href="" class="text-dark"> Sort by:Next activity(default)</a>
                            </option>
                            <option><a href="" class="text-dark"> Sort by:Deal title</a></option>
                            <option><a href="" class="text-dark"> Sort by:Deal value</a></option>
                            <option><a href="" class="text-dark"> Sort by:Linked person</a></option>
                            <option><a href="" class="text-dark"> Sort by:Linked organizations</a></option>
                            <option><a href="" class="text-dark"> Sort by:Expected close date</a></option>
                            <option><a href="" class="text-dark"> Sort by:Deal created</a></option>
                            <option><a href="" class="text-dark"> Sort by:Deal update time</a></option>
                            <option><a href="" class="text-dark"> Sort by:Done activities</a></option>
                            <option><a href="" class="text-dark"> Sort by:Activities to do</a></option>
                            <option><a href="" class="text-dark"> Sort by:Number of products</a></option>
                            <option><a href="" class="text-dark"> Sort by:Owner name</a></option>
                        </select>
                    </div>

                </div>

            </div>
            <div class="mt-3 row justify-content-center">
                <div class="col-md-2 col-12 mt-3 a40 a41 a42" style="height:400px;">
                    <p class="pt-2">Qualified lead <i class="fa fa-plus"></i></p>
                    <div class="sortableItem" id="qualified_lead" data-type="qualified">
                        @if (count($qualifiedLead) > 0)
                            @foreach ($qualifiedLead as $qlead)
                                <div class="a43 mt-2 col-md-12 drag-item11 cursor-pointer mb-lg-0 mb-4" data-id="{{$qlead->iid}}">
                                    <div class="row card-body p-2">
                                        <span class="col-md-12 a44">{{ $qlead->vTitle }}</span>
                                        <span class="col-md-12 a44">{{ $qlead->vCompany }},{{ $qlead->vFullname }}</span>
                                        <span class="col-md-8 col-8 a44"> <i class="fa fa-user taxt-light">
                                            </i>Rs.{{ $qlead->dValue }}</span>
                                        <span class="col-md-3 col-3">
                                            <i class="fa fa-clock text-light" aria-hidden="true" data-bs-toggle="modal"
                                                href="#exampleModalToggle3" role="button"
                                                title="Schedule an activitie"></i>
                                            <div class="modal fade modal-md modal-sm" id="exampleModalToggle3"
                                                aria-hidden="true" aria-labelledby="exampleModalToggleLabel3"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <a href="schedulefix.html" class="text-muted">
                                                                <span>You have no activities Schedule for this
                                                                    deal</span><br>
                                                                <span calss="p-0">
                                                                    <center> call on 3pm</center>
                                                                </span>
                                                                <span>
                                                                    <center> prakash kumar <br> Call thai gayo</center>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <hr>

                                                        <div class="modal-body">

                                                            <a href="schedulefix.html" class="text-muted"><i
                                                                    class="fa fa-plus"></i>Schedule an activitie
                                                            </a>



                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="a43 mt-2 col-md-12 drag-item cursor-pointer mb-lg-0 mb-4">
                                <div class="row card-body p-2">
                                    <span class="col-md-12 a44">No Qualified Lead found</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-2 col-12 mt-3 a40 a41 a42" style="height:400px;">
                    <p class="pt-2">Contact made <i class="fa fa-plus"></i></p>
                    <div class="sortableItem" id="contact_lead" data-type="contact">
                        @if (count($contactLead) > 0)
                            @foreach ($contactLead as $clead)
                                <div class="a43 mt-2 col-md-12 drag-item cursor-pointer mb-lg-0 mb-4" data-id="{{$clead->iid}}">
                                    <div class="row card-body p-2">
                                        <span class="col-md-12 a44">{{ $clead->vTitle }}</span>
                                        <span class="col-md-12 a44">{{ $clead->vCompany }},{{ $clead->vFullname }}</span>

                                        <span class="col-md-3 col-3"><i class="fa fa-phone text-light" aria-hidden="true"
                                                title="Schedule an activity" data-bs-toggle="modal"
                                                href="#exampleModalToggle11" role="button">
                                            </i>
                                            <div class="modal fade modal-md modal-sm" id="exampleModalToggle3"
                                                aria-hidden="true" aria-labelledby="exampleModalToggleLabel3"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <a href="schedulefix.html" class="text-muted">
                                                                <span>You have no activities Schedule for this
                                                                    deal</span><br>
                                                                <span calss="p-0">
                                                                    <center> call on 3pm</center>
                                                                </span>
                                                                <span>
                                                                    <center> prakash kumar <br> Call thai gayo</center>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <hr>

                                                        <div class="modal-body">

                                                            <a href="schedulefix.html" class="text-muted"><i
                                                                    class="fa fa-plus"></i>Schedule an activitie
                                                            </a>



                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="a43 mt-2 col-md-12 drag-item cursor-pointer mb-lg-0 mb-4">
                                <div class="row card-body p-2">
                                    <span class="col-md-12 a44">No Contact lead found</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-2 col-12 mt-3 a40 a41 a42" style="height:400px;">
                    <p class="pt-2">Demo planned <i class="fa fa-plus" id="demoLeadModalBtn"></i></p>
                    <div class="sortableItem" id="demo_lead" data-type="demo">
                        @if (count($demoLead) > 0)
                            @foreach ($demoLead as $dlead)
                                <div class="a43 mt-2 col-md-12 drag-item cursor-pointer mb-lg-0 mb-4" data-id="{{$dlead->iid}}">
                                    <div class="row card-body p-2">
                                        <span class="col-md-12 a44">{{ $dlead->vTitle }}</span>
                                        <span class="col-md-12 a44">{{ $dlead->vCompany }},{{ $dlead->vFullname }}</span>

                                        <span class="col-md-3 col-3"><i class="far fa-thumbs-up text-light"
                                                aria-hidden="true" title="Schedule an activity" data-bs-toggle="modal"
                                                href="#exampleModalToggle12" role="button">
                                            </i>
                                            <div class="modal fade modal-md modal-sm" id="exampleModalToggle3"
                                                aria-hidden="true" aria-labelledby="exampleModalToggleLabel3"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <a href="schedulefix.html" class="text-muted">
                                                                <span>You have no activities Schedule for this
                                                                    deal</span><br>
                                                                <span calss="p-0">
                                                                    <center> call on 3pm</center>
                                                                </span>
                                                                <span>
                                                                    <center> prakash kumar <br> Call thai gayo</center>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <hr>

                                                        <div class="modal-body">

                                                            <a href="schedulefix.html" class="text-muted"><i
                                                                    class="fa fa-plus"></i>Schedule an activitie
                                                            </a>



                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="a43 mt-2 col-md-12 drag-item cursor-pointer mb-lg-0 mb-4">
                                <div class="row card-body p-2">
                                    <span class="col-md-12 a44">No Demo lead found</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-2 col-12 mt-3 a40 a41 a42" style="height:400px;">
                    <p class="pt-2">Quotation sent <i class="fa fa-plus" id="quotationModalBtn"></i></p>
                    <div class="sortableItem" id="quotation_lead" data-type="quotation">
                        @if (count($quotationLead) > 0)
                            @foreach ($quotationLead as $Qtlead)
                                <div class="a43 mt-2 col-md-12 drag-item cursor-pointer mb-lg-0 mb-4" data-id="{{$Qtlead->iid}}">
                                    <div class="row card-body p-2">
                                        <span class="col-md-12 a44">{{ $Qtlead->vTitle }}</span>
                                        <span
                                            class="col-md-12 a44">{{ $Qtlead->vCompany }},{{ $Qtlead->vFullname }}</span>

                                        <span class="col-md-3 col-3"><i class="fa fa-quote-left text-light"
                                                aria-hidden="true" title="Schedule an activity" data-bs-toggle="modal"
                                                href="#exampleModalToggle13" role="button">
                                            </i>
                                            <div class="modal fade modal-md modal-sm" id="exampleModalToggle3"
                                                aria-hidden="true" aria-labelledby="exampleModalToggleLabel3"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <a href="schedulefix.html" class="text-muted">
                                                                <span>You have no activities Schedule for this
                                                                    deal</span><br>
                                                                <span calss="p-0">
                                                                    <center> call on 3pm</center>
                                                                </span>
                                                                <span>
                                                                    <center> prakash kumar <br> Call thai gayo</center>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <hr>

                                                        <div class="modal-body">
                                                            <a href="schedulefix.html" class="text-muted"><i
                                                                    class="fa fa-plus"></i>Schedule an activitie
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="a43 mt-2 col-md-12 drag-item cursor-pointer mb-lg-0 mb-4">
                                <div class="row card-body p-2">
                                    <span class="col-md-12 a44">No Quotation sent lead found</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-2 col-12 mt-3 a40 a41 a42" style="height:400px;">
                    <p class="pt-2">Inquiry nurture <i class="fa fa-plus" id="inquiryModalBtn"></i></p>
                    <div class="sortableItem" data-type="inquiry" id="inquiry_lead">
                        @if (count($inquiryLead) > 0)
                            @foreach ($inquiryLead as $inlead)
                                <div class="a43 mt-2 col-md-12 drag-item cursor-pointer mb-lg-0 mb-4" data-id="{{$inlead->iid}}" >
                                    <div class="row card-body p-2">
                                        <span class="col-md-12 a44">{{ $inlead->vTitle }}</span>
                                        <span
                                            class="col-md-12 a44">{{ $inlead->vCompany }},{{ $inlead->vFullname }}</span>
                                        <span class="col-md-8 col-8 a44"> <i class="fa fa-user taxt-light">
                                            </i>Rs.{{ $inlead->dValue }}</span>
                                        <span class="col-md-3 col-3"> <i class="fa fa-clock text-light"
                                                aria-hidden="true" data-bs-toggle="modal" href="#exampleModalToggle3"
                                                role="button" title="Schedule an activitie"></i>
                                            <div class="modal fade modal-md modal-sm" id="exampleModalToggle3"
                                                aria-hidden="true" aria-labelledby="exampleModalToggleLabel3"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <a href="schedulefix.html" class="text-muted">
                                                                <span>You have no activities Schedule for this
                                                                    deal</span><br>
                                                                <span calss="p-0">
                                                                    <center> call on 3pm</center>
                                                                </span>
                                                                <span>
                                                                    <center> prakash kumar <br> Call thai gayo</center>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <hr>
                                                        <div class="modal-body">
                                                            <a href="schedulefix.html" class="text-muted"><i
                                                                    class="fa fa-plus"></i>Schedule an activitie
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="a43 mt-2 col-md-12 drag-item cursor-pointer mb-lg-0 mb-4">
                                <div class="row card-body p-2">
                                    <span class="col-md-12 a44">No Inquiry lead found</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3 col-4 mt-3">
                    <button class="btn btn-default text-muted  a46 col-md-12">
                        DELETE
                    </button>
                </div>

                <div class="col-md-3 col-3 mt-3">
                    <button class="btn btn-default text-danger a46 col-md-12" data-bs-toggle="modal"
                        data-bs-target="#addNewCCModal">
                        LOST
                    </button>


                </div>

                <div class="col-md-3 col-3 mt-3">
                    <button class="btn btn-default text-success  a46 col-md-12">
                        WON
                    </button>
                </div>

                <div class="col-md-3 col-6 mt-3">
                    <button class="btn btn-default text-muted  a46 col-md-12">
                        MOVE/CONVERT
                    </button>
                </div>

            </div>
        </div>
        @include('admin/lead/modals')
    </div>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="{{ url('admins/assets/vendor/libs/sortablejs/sortable.js') }}"></script>
    <script src="{{ url('admins/assets/js/extended-ui-drag-and-drop.js') }}"></script>
    @include('admin.lead.script')
@endpush
