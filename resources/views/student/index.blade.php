<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Hover Rows</h2>
    <p>The .table-hover class enables a hover state on table rows:</p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>


        @foreach($students as $key=>$student)

        <tr>

            <td>{{ $key+1 }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>

                <a onclick="return confirm('Are you sure to delete?')" href="{{ url('delete/student/data') }}" data-id="{{ $student->id }}" id="delete" class="btn btn-sm btn-danger">Delete</a>

            </td>
        </tr>

        @endforeach

        </tbody>
    </table>
</div>

<div id="getalldata" data-url="{{ url('get/student/data') }}"></div>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>



<script>

    $(function(){
        // Delete Data
        $(document).on("click", "#delete", function(arg){
            arg.preventDefault();
            var id = $(this).data("id");
            var url = $(this).attr('href');

            $.ajax({
                url: url,
                data: {id:id},
                type: "GET",
                dataType: "JSON",
                success(response){
                    swal("Deleted", "Customer Data Has Been Deleted", "success");
                    return getCustomerData();
                }
            })

        })


    });


</script>



</body>
</html>
