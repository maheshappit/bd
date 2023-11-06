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


    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container">
        <h5>BD Users Data</h5>
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Create Date</th>
                    <th>Email sent Date</th>
                    <th>Company Source</th>
                    <th>Contact Source</th>
                    <th>Database Creator Name</th>
                    <th>Technology</th>
                    <th>Client Speciality</th>
                    <th>Client Name</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip Code</th>
                    <th>Country</th>
                    <th>Website</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th>Email Response 1</th>
                    <th>Email Response 2</th>
                    <th>Rating</th>
                    <th>FollowUp</th>
                    <th>LinkedIn Link</th>
                    <th>Employee Count</th>
                    <th>Action<th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users_data as $item)
                <tr>
                <td>{{ $item->id }}</td>
            <td>{{ $item->create_date }}</td>
            <td>{{ $item->email_sent_date }}</td>
            <td>{{ $item->company_source }}</td>
            <td>{{ $item->contact_source }}</td>
            <td>{{ $item->database_creator_name }}</td>
            <td>{{ $item->technology }}</td>
            <td>{{ $item->client_speciality }}</td>
            <td>{{ $item->client_name }}</td>
            <td>{{ $item->street }}</td>
            <td>{{ $item->city }}</td>
            <td>{{ $item->state }}</td>
            <td>{{ $item->zip_code }}</td>
            <td>{{ $item->country }}</td>
            <td>{{ $item->website }}</td>
            <td>{{ $item->first_name }}</td>
            <td>{{ $item->last_name }}</td>
            <td>{{ $item->designation }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->email_response_1 }}</td>
            <td>{{ $item->email_response_2 }}</td>
            <td>{{ $item->rating }}</td>
            <td>{{ $item->followup }}</td>
            <td>{{ $item->linkedin_link }}</td>
            <td>{{ $item->employee_count }}</td>
                    <td>
                        <a href="{{ route('admin.edit', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('admin.delete', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                    </td> 
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script>
        $(document).ready(function() {
            var myTable; // Declare a variable to store the DataTable object

            myTable = $('#datatable').DataTable({
                dom: 'lBfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf'],
                columns: [{
                        data: 'column1'
                    },
                    {
                        data: 'column2'
                    },
                    {
                        data: 'column3'
                    },
                    {
                        data: 'column4'
                    },
                    {
                        data: 'column5'
                    },
                    {
                        data: 'column6'
                    },
                    {
                        data: 'column7'
                    },
                    {
                        data: 'column8'
                    },
                    {
                        data: 'column9'
                    },
                    {
                        data: 'column10'
                    },
                    {
                        data: 'column11'
                    },
                    {
                        data: 'column12'
                    },
                    {
                        data: 'column13'
                    },
                    {
                        data: 'column14'
                    },
                    {
                        data: 'column15'
                    },
                    {
                        data: 'column16'
                    },
                    {
                        data: 'column17'
                    },
                    {
                        data: 'column18'
                    },
                    {
                        data: 'column19'
                    },
                    {
                        data: 'column20'
                    },
                    {
                        data: 'column21'
                    },
                    {
                        data: 'column22'
                    },
                    {
                        data: 'column23'
                    },
                    {
                        data: 'column24'
                    },
                    {
                        data: 'column25'
                    },
                    {
                        data: 'column26'
                    },
                ]
            });

            myTable.buttons().disable();


            myTable.columns().every(function() {
                var column = this;
                var columnIndex = column.index();

                var input = $('<input type="text" placeholder="Search..."/>')
                    .appendTo($(column.header()))
                    .on('keyup change', function() {
                        column.search(this.value).draw();
                        myTable.buttons().enable();

                    });
            });
        });
    </script>



    @endsection