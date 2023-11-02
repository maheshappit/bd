@extends('layouts.app')


<link href="https://cdn.datatables.net/v/bs5/jqc-1.12.4/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/fh-3.4.0/r-2.5.0/sc-2.2.0/sb-1.6.0/datatables.css" rel="stylesheet">
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jqc-1.12.4/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/fh-3.4.0/r-2.5.0/sc-2.2.0/sb-1.6.0/datatables.js"></script>



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>



                <div class="card-body">

                    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" accept=".csv">
                        <button class="btn btn-primary" type="submit">Upload</button>
                    </form>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif


                </div>
            </div>
        </div>
</div>



<div class="container">
    <h5>BD Users Data</h5>
    <table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
            <!-- Add more columns as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($users_data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->first_name }}</td>
                <td>{{ $item->email }}</td>
                <td>Edit</td>
                <!-- Add more columns as needed -->
            </tr>
        @endforeach
    </tbody>
</table>
   
</div>


 


<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });
    });
</script>






@endsection