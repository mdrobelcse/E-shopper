@extends('layouts.backend.app')

@push('css')



@endpush

@section('content')

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Edit Category</li>
                </ol>
            </div>


            @if($order->order_status == 0)

                <div class="col-md-7 col-4 align-self-center">

                    <button type="submit" onclick="acceptOrder({{ $order->id }})" class="btn waves-effect btn-success pull-right hidden-sm-down">
                        <i class="material-icons">add_circle</i>
                        <sup>Accept Order</sup>
                    </button>


                    <form method="post" action="{{ route('admin.order.approve',$order->id) }}" id="approval-form" style="display: none">
                        @csrf
                        @method('PUT')
                    </form>

                </div>

            @elseif($order->order_status == 1)



                <div class="col-md-7 col-4 align-self-center">

                    <button class="btn waves-effect btn-info pull-right hidden-sm-down disabled">
                        <i class="material-icons">check_circle_outline</i>
                        <sup>Order accepted</sup>
                    </button>

                </div>


            @elseif($order->order_status == 2)



                <div class="col-md-7 col-4 align-self-center">

                    <button class="btn waves-effect btn-danger pull-right hidden-sm-down disabled">
                        <i class="material-icons">check_circle_outline</i>
                        <sup>Order completed</sup>
                    </button>

                </div>


            @endif






        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->

            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-block">

                            <div class="form-group">
                                <label class="col-md-12">Customer Name:</label>
                                <div class="col-md-12">
                                    <input type="text" name="name" value="{{ $order->name }}" class="form-control form-control-line" readonly="">
                                </div>
                            </div>

                            <div class="form-group">
                               <label class="col-md-12">Customer E-mail:</label>
                               <div class="col-md-12">
                                  <input type="text" name="email" value="{{ $order->email }}" class="form-control form-control-line" readonly="">
                               </div>
                            </div>

                            <div class="form-group">
                              <label class="col-md-12">Customer Phone:</label>
                              <div class="col-md-12">
                                  <input type="text" name="phone" value="{{ $order->phone }}" class="form-control form-control-line" readonly="">
                              </div>
                           </div>

                        <div class="form-group">
                            <label class="col-md-12">Shipping address:</label>
                            <div class="col-md-12">
                                <input type="text" name="address" value="{{ $order->address }}" class="form-control form-control-line" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Payment Method:</label>
                            <div class="col-md-12">
                                <input type="text" name="address" value="{{ $order->payment_id == null ? 'Cashin' : $order->payment->payment_name  }}" class="form-control form-control-line" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Customer message:</label>
                            <div class="col-md-12">
                                <textarea name="message" rows="5" class="form-control form-control-line" readonly="">{{ $order->message }}</textarea>
                            </div>
                        </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-info">Back</a>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->

        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">All Order</h4>

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product quantity</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($allproducts as $key=>$pro)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img class="img-thumbnail" src="{{ url('storage/product/'.$pro->product->image) }}" alt="" height="50px" width="80px"></td>
                                    <td>{{ $pro->product->title }}</td>
                                    <td>{{ $pro->product_quantity }}</td>
                                    <td>
                                        <a href="{{ route('admin.product.show',$pro->product_id)  }}" class="btn btn-success btn-sm"><i class="material-icons">visibility</i></a>

                                    </td>

                                    </td>
                                </tr>

                             @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>


@endsection

@push('js')


    <!--javascripts swwtalert start-->


    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
        });
        function acceptOrder(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to approve this post ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approval-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The post remain pending :)',
                        'info'
                    )
                }
            })
        }
    </script>


    <!--javascripts sweet alert end-->


@endpush