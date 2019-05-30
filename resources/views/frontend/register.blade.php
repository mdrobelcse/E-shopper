@extends('layouts.frontend.app')


@section('content')

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="#">
                            <input type="text" placeholder="Name" />
                            <input type="email" placeholder="Email Address" />
                            <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form method="POST" action="{{ route('register') }}" id="register-form">
                            @csrf

                            <div class="form-group row">


                                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>

                            <div class="form-group row">


                                    <input id="email" type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>

                            <div class="form-group row">


                                <input id="phone" type="text" class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" placeholder="Phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group row">


                                <select id="division" class="@error('division') is-invalid @enderror" name="division">

                                    <option disabled selected>Select Division</option>

                                    @foreach($divisions as $division)
                                      <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                    @endforeach

                                </select>


                                @error('division')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group row">


                                <select id="district" class="@error('district') is-invalid @enderror" name="district">


                                    <option disabled selected>Select District</option>

                                </select>



                                @error('district')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group row">


                                <input id="address" type="text" class="@error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" placeholder="Address">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group row">


                                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>

                            <div class="form-group row">


                                    <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password" placeholder="confirm-password">

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

@endsection


@push('js')



        <script type="text/javascript">
            $(document).ready(function() {
                $('select[name="division"]').on('change', function() {
                    var divisionID = $(this).val();
                    if(divisionID) {
                        $.ajax({
                            url: 'dropdownlist/getdistrict/'+divisionID,
                            type: "GET",
                            dataType: "json",
                            success:function(data) {

                                $('select[name="district"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="district"]').append('<option value="'+ value.id +'">'+ value.district_name +'</option>');
                                });
                            }
                        });
                    }else{
                        $('select[name="district"]').empty();
                    }
                });
            });
    </script>




@endpush