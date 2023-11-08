@extends('layouts.app')

@extends('layouts.formupload')




@section('content')

<style>
    td {
        white-space: nowrap;
        /* max-width: 100%; */
    }

    .dataTables tbody tr {
        min-height: 3px;
        /* or whatever height you need to make them all consistent */
    }

    .card {
        width: fit-content !important;
        top: 80px;

    }

    .alert {
        width: fit-content;
    }
</style>

<div class="container">


   

    @if(session('success'))



    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('success') }}
    </div>
    @endif




    <div class="container">

        <div class="card">
            <div class="card-body">

                <h5 class="card-title">BD Users Data</h5>

                <table id="datatable" class="table table-sttriped-borderd">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Industry</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Client Name</th>

                            <th>Contact Source</th>
                            <th>Database Creator Name</th>
                            <th>Technology</th>
                            <th>Client Speciality</th>
                            <th>Street</th>
                            <th>City</th>
                            <th>Zip Code</th>
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
                            <th>Action</th>

                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $serial = 1; // Initialize a serial number variable
                        @endphp
                        @foreach ($users_data as $item)
                        <tr>
                            <td>{{$serial++}}</td>

                            <td>{{ $item->technology }}</td>
                            <td>{{ $item->state }}</td>
                            <td>{{ $item->country }}</td>
                            <td>{{ $item->client_name }}</td>
                            <td>{{ $item->database_creator_name }}</td>
                            <td>{{ $item->technology }}</td>
                            <td>{{ $item->client_speciality }}</td>
                            <td>{{ $item->client_name }}</td>
                            <td class="more">{{ $item->street }}</td>
                            <td>{{ $item->city }}</td>
                            <td>{{ $item->zip_code }}</td>
                            <td>{{ $item->website }}</td>
                            <td>{{ $item->first_name }}</td>
                            <td>{{ $item->last_name }}</td>
                            <td>{{ $item->designation }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->email_response_1 }}</td>
                            <td>{{ $item->email_response_2 }}</td>
                            <td>{{ $item->rating }}</td>
                            <td>{{ $item->followup }}</td>

                            <td class="more">{{$item->linkedin_link}}</td>
                            <td>{{ $item->employee_count }}</td>
                            <td>
                                <a href="{{ route('user.edit', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>


    </div>



</div>


    <script>
        $(document).ready(function() {
            var myTable; // Declare a variable to store the DataTable object

            myTable = $('#datatable').DataTable({
                // dom: 'lBfrtip',
                // 'responsive': true,

                buttons: ['copy', 'csv', 'excel', 'pdf'],
                "columnDefs": [{
                    // "width": "20%",
                    "targets": 0
                }],
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
                        data: "column23",

                    },
                    {
                        data: 'column24'
                    },


                ]
            });



            myTable.buttons().disable();

            // myTable.columns().every(function() {
            //     var column = this;
            //     var columnIndex = column.index();

            //     var input = $('<input type="text" placeholder="Search..."/>')
            //         .appendTo($(column.header()))
            //         .on('keyup change', function() {
            //             column.search(this.value).draw();
            //             myTable.buttons().enable();

            //         });
            // });

            // Array of specific headers you want to target
            var specificHeaders = ['Industry', 'State', 'Country', 'Client Name'];

            myTable.columns().every(function() {
                var column = this;
                var columnIndex = column.index();
                var columnHeader = $(column.header()).text().trim(); // Get the header text

                // Check if the current header matches one of the specific headers
                if (specificHeaders.includes(columnHeader)) {
                    var input = $('<input style="width:100px;" type="text" placeholder="Search..."/>')
                        .appendTo($(column.header()))
                        .on('keyup change', function() {
                            column.search(this.value).draw();
                            myTable.buttons().enable();
                        });
                }
            });







        });
    </script>



    <script>
        $(document).ready(function() {
            var showChar = 10;

            $('#datatable tbody .more').each(function() {
                var content = $(this).html();
                var row = $(this).closest('tr');

                if (content.length > showChar) {
                    var arr = [];
                    var pos = 0;

                    for (var i = 0; i < content.length / showChar; i++) {
                        arr.push(content.substr(pos, showChar));
                        pos += showChar - 1;
                    }

                    var html = '';

                    for (var i = 0; i < arr.length; i++) {
                        html += `<div class="text-${i}" style="display: none;">`;
                        html += arr[i];
                        html += ` - <span class="more-link-${i}" style="color: blue">more</span> <span class="less-link-${i}" style="color: green; display: none">less</span>`;
                        html += '</div>';
                    }

                    $(this).html(html);
                    row.find('.text-0').css('display', 'block');

                    for (var i = 0; i < arr.length - 1; i++) {
                        (function(index) {
                            row.find(`.more-link-${index}`).on('click', function() {
                                row.find(`.text-${index + 1}`).css('display', 'block');
                                row.find(`.more-link-${index}`).css('display', 'none');
                                row.find(`.less-link-${index}`).css('display', 'inline-block');
                            });

                            row.find(`.less-link-${index}`).on('click', function() {
                                row.find(`.text-${index + 1}`).css('display', 'none');
                                row.find(`.less-link-${index}`).css('display', 'none');
                                row.find(`.more-link-${index}`).css('display', 'inline-block');
                            });
                        })(i);
                    }
                }
            });
        });
    </script>





    @endsection