@extends('layouts.dashboard')
@section('title')
    History
@endsection
@section('css')
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
@endsection
@section('body')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">History</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary fs-4">History</h6>

            </div>

        </div>
        <div class="card-body">
            @include('sweetalert::alert')

            <div class="table-responsive">
                <table border="0" cellspacing="5" cellpadding="5">
                    <tbody>
                        <tr>
                            <td>Date:</td>
                            <td id="min"> </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">

                    <div class="d-flex flex-row mb-3 " id="userstable_filter">

                    </div>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Member Id</th>
                            <th>Customer Name</th>
                            <th>Massage</th>
                            <th>Price</th>
                            <th>Employee</th>
                            <th>Date</th>
                    </thead>

                    <tbody>
                        @foreach ($data as $commo)
                            <tr class="text-nowrap">
                                <td>{{ $loop->iteration }}</td>
                                <td class="user-select-all">{{ $commo->cus_id }}</td>
                                <td>{{ $commo->cus_name }}</td>
                                <td>{{ $commo->massage_name }}</td>
                                <td>${{ ReadableNumber($commo->massage_price) }}</td>
                                <td>{{ $commo->emp_name }}</td>
                                <td>{{ Carbon\Carbon::parse($commo->start_time)->format('Y-m-d') }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" style="text-align:right">Total:</th>
                            <th ></th>
                            <th ></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.bootstrap5.min.js"></script>



    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js">
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api(),
                        data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column(4)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    // Total filtered rows on the selected column (code part added)
                    var sumCol4Filtered = display.map(el => data[el][4]).reduce((a, b) =>
                        intVal(a) + intVal(b), 0);

                    // Update footer
                    $(api.column(4).footer()).html(
                        ' $' + sumCol4Filtered + ' for filtered  ($' + total + ' total)'
                    );
                },
                initComplete: function() {
                    this.api()
                            .columns([1,2,3,5,6])
                            .every(function() {
                               
                                var column = this;
                                if (column.index() != 6) {
                                var select = $(
                                    '<select class="form-select fter mx-2"><option value="">' +
                                    column
                                    .header().textContent +
                                    ' (All)</option></select>'
                                ).appendTo('#userstable_filter').on('change',
                                    function() {
                                        column.search($(this).val()).draw();
                                    });

                                column
                                    .data()
                                    .unique()
                                    .sort()
                                    .each(function(d, j) {
                                        select.append('<option>' + d + '</option>');
                                    });
                                } else {
                                var select = $('<input type="date" class="form-control" id="min" name="min">').appendTo(
                                    '#min').on('change',
                                    function() {
                                        var val = $.fn.dataTable.util.escapeRegex($(this)
                                    .val());
                                        column.search(val ? '^' + val + '$' : '', true, false)
                                            .draw();
                                    });
                            }
                            });
                        var bt = $('<button class="btn btn-primary">Reset</button>').appendTo(
                            '#userstable_filter').on('click',
                            function() {
                                $('.fter').val('');
                                var table = $('#dataTable').DataTable();
                                table.search('').columns().search('').draw();

                            });
                   
                },
                "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            });

            //setInterval(function() {
            //$("#dataTable").load(" #dataTable");
            //}, 5000);
        });
    </script>
@endsection
