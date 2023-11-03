@extends('layouts.adminapp')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Upload') }}</div>



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

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

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
                <td colspan="2">
                <a href="{{ route('admin.edit', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('admin.delete', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
            </td>                <!-- Add more columns as needed -->
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