@extends('layouts.adminlayouts')

@section('content')
<div class="wrapper wrapper-content">

        <div class="row">
            <div class="col-lg-12">
                <div class="passwordBox animated bounceIn">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="ibox-content">

                                <h2 class="font-bold">@lang('Reset password')</h2>

                                <p>
                                    @lang('Enter your Current and New password to reset your password').
                                </p>

                                <div class="row">

                                    <div class="col-lg-12">
                                        <form class="m-t" method="post" role="form" action="{{URL::to('/resetpass')}}">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="currentpass" placeholder="@lang('Current Password')" required="">
                                            </div>

                                            <div class="form-group">
                                                <input type="password" class="form-control" name="newpassword" placeholder="@lang('New Password')" required="">
                                            </div>

                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="@lang('Confirm New Password')" required="">
                                            </div>

                                            <button type="submit" class="btn btn-primary block full-width m-b">@lang('Reset Password')</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                </div>
            </div>
        </div>


        </div>
@include('layouts.adminfooter')
@endsection

