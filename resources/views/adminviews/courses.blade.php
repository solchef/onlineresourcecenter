@extends('layouts.adminlayouts')

@section('content')
    <div class="wrapper wrapper-content">

        <div class="row">

            <div class="col-lg-6 col-lg-offset-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>@lang('Add a New Course')</h5>
                    </div>
                    <div class="ibox-content">
                        <form role="form" method="post" action="createcourse" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Course Code</label>
                                <input type="text" name="course_code" class="form-control" id="message" required>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Course Name</label>
                                <input type="text" name="course_name" class="form-control" id="message" required>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Campus</label>
                                <select class="form-control" name="campus" required>
                                    <option value="">Select Campus</option>

                                    @foreach ($campus as $cmp)
                                        <option value="{{ $cmp->id }}">{{ $cmp->campusname }}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Category</label>
                                <select class="form-control" name="field_id" required>
                                    <option value="">Select Category</option>

                                    <option value="1">Certificate</option>
                                    <option value="2">Diploma</option>
                                    <option value="3">Post-Graduate</option>

                                </select>

                            </div>
                            <input type="hidden" name="status" value="1">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Currency</label>
                                <select name="currency" class="form-control" required>
                                    <option value="">Select the Currency</option>
                                    <option value="USD">USD</option>
                                    <option value="EUROS">EURO</option>
                                    <option value="KSH">KSH</option>

                                </select>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Fees Payable</label>
                                <input type="text" name="feespayable" class="form-control" id="message" required>

                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Course Brief</label>
                                <input type="file" name="coursebriefs" class="form-control" id="coursebriefs" required>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea type="description" name="description" class="form-control" id="message"
                                    placeholder="Type description of the faculty" required>
                        </textarea>
                            </div>


                            <button type="Add" class="btn btn-default">Submit</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="modal inmodal" id="managecategory" tabindex="-1" style="margin-top: 50px;" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">

                <form action="{{ url('updatecategory') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <h3><u>Edit Category</u></h3>
                        <div class="row">

                            <input type="hidden" name="catid" id="catid">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Category Name</label>
                                    <input type="text" id="catname" class="form-control" name="catname" value="">
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <a href="" id="delete-category" class="btn btn-danger">Delete</a>
                        <button type="submit" class="btn btn-primary">Apply </button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    @include('layouts.adminfooter')
@endsection
