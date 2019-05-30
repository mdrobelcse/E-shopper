@extends('layouts.frontend.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-8">

                    <div class="response-area">
                        <ul class="media-list">
                            <li>

                                <a class="pull-left" href="#">

                                    @if(Auth::user()->image == 'default.png')

                                        <img class="media-object" src="{{ url('storage/profile/default.jpeg') }}" style="height: 100px;width: 100px;border-radius: 50%;" alt="">

                                    @else

                                        <img class="media-object" src="{{ url('storage/profile/'.Auth::user()->image) }}" style="height: 100px;width: 100px;border-radius: 50%;" alt="">

                                    @endif
                                </a>
                            </li>


                        </ul>
                    </div><!--/Response-area-->
                    <div class="replay-box">
                        <div class="row">
                            <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="col-sm-4">
                                    <div class="blank-arrow">
                                        <label>Name</label>
                                    </div>
                                    <span>*</span>
                                    <input type="text" value="{{ Auth::user()->name }}" name="name">
                                    <div class="blank-arrow">
                                        <label>Email Address</label>
                                    </div>
                                    <span>*</span>
                                    <input type="text" value="{{ Auth::user()->email }}" name="email">
                                    <div class="blank-arrow">
                                        <label>Phone</label>
                                    </div>
                                   <span>*</span>
                                    <input type="text" value="{{ Auth::user()->phone }}" name="phone">

                                    <div class="blank-arrow">
                                       <label>Address</label>
                                    </div>
                                    <input type="text" value="{{ Auth::user()->address }}" name="address">

                                    <div class="blank-arrow">
                                      <label>Image</label>
                                    </div>
                                    <input type="file" name="image">

                            </div>
                            <div class="col-sm-8">
                                <div class="text-area">
                                    <div class="blank-arrow">
                                        <label>About</label>
                                    </div>
                                    <span>*</span>
                                    <textarea name="about" rows="11">{{ Auth::user()->about }}</textarea>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div><!--/Repaly Box-->
                </div>

                <div class="col-sm-2">

                </div>
            </div>
        </div>
    </section>



@endsection