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
                <h3 class="text-themecolor m-b-0 m-t-0">Table</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Table</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">

                <a href="" class="btn waves-effect btn-success pull-right hidden-sm-down">
                    <i class="material-icons">add_circle</i>
                    <sup>Order</sup>
                </a>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
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
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Order status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($orders as $key=>$order)


                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>

                                        @if($order->order_status==0)

                                            <span class="badge badge-danger">Order pending</span>

                                        @elseif($order->order_status==1)

                                            <span class="badge badge-success">Order Confirmed</span>

                                        @else

                                            <span class="badge badge-info">Order Completed</span>


                                        @endif

                                    </td>

                                    <td>
                                        <a href="{{ route('admin.order.view',$order->id) }}" class="btn btn-success btn-sm">
                                            <i class="material-icons">visibility</i>
                                        </a>

                                        @if($order->order_status == 2)

                                            <button type="button" class="btn btn-info btn-sm disabled">
                                                <i class="material-icons">check_circle_outline</i>
                                            </button>

                                        @else

                                            <button type="submit" onclick="orderComplete({{ $order->id }})" class="btn btn-info btn-sm">
                                                <i class="material-icons">check_circle_outline</i>
                                            </button>

                                            <form method="post" action="{{ route('admin.order.complete',$order->id) }}" id="complete-form-{{ $order->id }}" style="display: none">
                                                @csrf
                                                @method('PUT')
                                            </form>

                                        @endif


                                        <button type="submit" onclick="orderDeleted({{ $order->id }})" class="btn btn-danger btn-sm">
                                            <i class="material-icons">delete</i>
                                        </button>

                                        <form method="post" action="{{ route('admin.order.destroy',$order->id) }}" id="delete-form-{{ $order->id }}" style="display: none">
                                            @csrf
                                            @method('delete')
                                        </form>


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


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

        function orderComplete(id)
        {

            swal({
                title:"Red Stapler",
                text: "Are You Sure? the order is completed?",
                buttons: {
                    cancel: true,
                    confirm: "complete"
                }
            }).then( val => {
                if(val)  {
                    event.preventDefault();
                    document.getElementById('complete-form-'+id).submit();
                }
                else {
                    swal("Your data is safe!");
                }

            });
        }



        function orderDeleted(id)
        {

            swal({
                title:"Red Stapler",
                text: "Are You Sure? you want to delete this?",
                buttons: {
                    cancel: true,
                    confirm: "delete"
                }
            }).then( val => {
                if(val)  {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                }
                else {
                    swal("Your data is safe!");
                }

            });
        }

    </script>


    <!--javascripts sweet alert end-->



    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script>

        $(document).ready(function() {
            $('#example').DataTable();
        } );

    </script>




@endpush