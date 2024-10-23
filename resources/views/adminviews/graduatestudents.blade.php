@extends('layouts.adminlayouts')

@section('content')
    <div class="wrapper wrapper-content">

        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Graduate Students</h5>
                        {{-- <a href="exportdata" class="btn btn-primary btn-sm pull-right">Export Students List to Excel</a> --}}
                        {{-- <a href="{{ url('exportdata', request()->all()) }}" class="btn btn-primary btn-sm pull-right">Export Students List to Excel</a> --}}
                    </div>
                    <div class="ibox-content">
                        <div>
                            <h4>Institution Criteria</h4>
                            <form method="get" action="manageusers">
                                @if (Auth::user()->roleid == 1)
                                    <div class="col-md-3 pull-left">
                                        <label>Select Campus</label>
                                        <select class="form-control" name="campus">
                                            <option value="">Select Campus</option>
                                            @foreach ($campuses as $camp)
                                                <option value="{{ $camp->id }}">{{ $camp->campusname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="col-md-3 pull-left">
                                    <label>Select Faculty</label>
                                    <select class="form-control" name="faculty" id="coursefaculty">
                                        <option value="">Select Faculty</option>
                                        @foreach ($faculties as $fac)
                                            <option value="{{ $fac->id }}">{{ $fac->faculty_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 pull-left">
                                    <label>Select Course</label>
                                    <select class="form-control" name="course" id="courselist">
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Filter</label>
                                    <button type="submit" class="form-control btn btn-danger blue-bg">Filter Data</button>
                                </div>
                            </form>
                        </div>
                        <br /><br />
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Students Criteria</h4>

                                <form method="get" action="manageusers">
                                    <div class="col-md-4 pull-left">
                                        <label>Enter Student Name</label>
                                        <input type="text" name="student" class="form-control">
                                    </div>

                                    <div class="col-md-4 pull-left">
                                        <label>Student Registration Date</label>
                                        <input type="date" name="regdate" class="form-control">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Filter</label>
                                        <button type="submit" class="form-control btn btn-danger blue-bg">Filter
                                            Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row" style="border-top:1px solid gray; margin-top:15px;">
                            <div class="col-md-8">
                                {{ $users->appends(request()->input())->links('pagination::bootstrap-4') }}
                            </div>
                            <div class="col-md-4" style="margin-top:20px;">
                                <form id="exportForm" method="POST" action="{{ url('exportdata') }}">
                                    @csrf
                                    <input type="hidden" name="campus" value="{{ request()->input('campus') }}">
                                    <input type="hidden" name="faculty" value="{{ request()->input('faculty') }}">
                                    <input type="hidden" name="course" value="{{ request()->input('course') }}">
                                    <input type="hidden" name="student" value="{{ request()->input('student') }}">
                                    <input type="hidden" name="regdate" value="{{ request()->input('regdate') }}">
                                    <input type="hidden" name="completion" value="2">

                                    <button type="submit" class="btn btn-primary btn-sm pull-right">Export List to
                                        Excel</button>
                                </form>
                            </div>
                        </div>

                        <!-- Replaced Input::get() with request()->get() -->
                        @php($cat = request()->get('category'))
                        @php($camp = request()->get('campus'))
                        @php($fac = request()->get('faculty'))
                        @php($cou = request()->get('course'))
                        @php($dat = request()->get('regdate'))

                        <table class="table table-responsive table-stripped table-bordered">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>email</th>
                                    <th>Campus</th>
                                    <th>Course</th>

                                    @if (Auth::user()->roleid == 1 or Auth::user()->roleid == 5)
                                        <th>Balance</th>
                                        <th>Receive</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        @if (Auth::user()->roleid == 5)
                                            <th>Delete</th>
                                        @endif
                                        <th>Account Status</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="">{{ $user->id }}</td>
                                        <td class="">{{ $user->name }}</td>
                                        <td class="">{{ $user->mobile }}</td>
                                        <td class="">{{ $user->email }}</td>
                                        <td class="">{{ $user->campusname }}</td>
                                        <td class="">{{ $user->course_name }}</td>

                                        @if (Auth::user()->roleid == 1 or Auth::user()->roleid == 5)
                                            <td class="">{{ $user->balance }}</td>
                                            <td class=""><a href="receivefees/{{ $user->id }}">Receive</a></td>
                                            <td class="">
                                                <a class="" href="updateprofile/{{ $user->id }}">
                                                    <i class="fa fa-eye"></i>View
                                                </a>
                                            </td>
                                            <td class="">
                                                <a class="" href="edituser/{{ $user->id }}">
                                                    <i class="fa fa-edit"></i>Edit
                                                </a>
                                            </td>
                                            @if (Auth::user()->roleid == 5)
                                                <td class="">
                                                    <a class="" href="deletestudent/{{ $user->id }}">
                                                        <i class="fa fa-remove"></i>Delete
                                                    </a>
                                                </td>

                                                @if ($user->status == 1)
                                                    <td><a class="col-md-4" class="btn btn-danger btn-sm"
                                                            href="deactivateaccount/{{ $user->id }}">Deactivate</a>
                                                    </td>
                                                @else
                                                    <td><a class="col-md-4" class="btn btn-success btn-sm"
                                                            href="activateaccount/{{ $user->id }}">Activate</a></td>
                                                @endif
                                            @endif

                                            @if (Auth::user()->roleid == 1)
                                                @if ($user->status == 1)
                                                    <td><a class="col-md-4" class="btn btn-success btn-sm"
                                                            href="#">Active</a></td>
                                                @else
                                                    <td><a class="col-md-4" class="btn btn-danger btn-sm"
                                                            href="#">Inactive</a></td>
                                                @endif
                                            @endif
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    @include('layouts.adminfooter')
@endsection
