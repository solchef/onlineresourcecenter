@extends('layouts.adminlayouts')

@section('content')
    <div class="wrapper wrapper-content">

        <div class="row">
            <!--/span-->

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Courses List</h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-responsive table-stripped table-bordered">
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Category</th>
                            <th>Course Profile</th>
                            @if (Auth::user()->roleid == 1)
                                <th>Upload Content</th>
                            @elseif(Auth::user()->roleid == 2)
                                <th>Uploaded Content</th>
                            @endif
                            @if (Auth::user()->roleid == 1 || Auth::user()->roleid == 5)
                                <th>Edit</th>
                                <th>Delete</th>
                            @endif
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $course->course_code }}</td>
                                        <td>{{ $course->course_name }}</td>
                                        <td>{{ $course->faculty_name }}</td>
                                        <td><a href="courseprofile/{{ $course->id }}"><button
                                                    class="btn btn-xs btn-primary col-md-12">Course Profile</button></a></td>
                                        @if (Auth::user()->roleid == 1)
                                            <td><a href="unitprofile/{{ $course->id }}"><button
                                                        class="btn btn-xs btn-success col-md-12">Upload Content</button></a>
                                            </td>
                                        @elseif(Auth::user()->roleid == 2)
                                            <td><a href="unitprofile/{{ $course->id }}"><button
                                                        class="btn btn-xs btn-success col-md-12">Uploaded
                                                        Content</button></a></td>
                                        @endif
                                        @if (Auth::user()->roleid == 1)
                                            <td><a href="editcourse/{{ $course->id }}"><button
                                                        class="btn btn-xs btn-green col-md-12">Edit</button></a></td>
                                            <td><a href="deletecourse/{{ $course->id }}"><button
                                                        class="btn btn-xs btn-danger col-md-12">Delete</button></a>
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                        <nav>{{ $courses->links() }}</nav>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @include('layouts.adminfooter')
@endsection
