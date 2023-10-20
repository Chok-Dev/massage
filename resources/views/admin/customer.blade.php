@extends('layouts.dashboard')
@section('title')
Customer
@endsection
@section('css')
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('body')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customer</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary fs-4">Customer</h6>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add
                </button>
            </div>

        </div>
        <div class="card-body">
            @include('sweetalert::alert')

            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <div class="d-flex flex-row mb-3 " id="userstable_filter">

                    </div>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Member Id</th>
                            <th>Name</th>
                            <th>Telephone</th>
                            <th>Action</th>
                    </thead>
{{-- {{ Haruncpi\LaravelIdGenerator\IdGenerator::generate(['table' => 'customers', 'length' => 8, 'prefix' => 'MS']) }} --}}
                    <tbody>
                        @foreach ($data as $commo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="user-select-all">{{ $commo->id }}</td>
                                <td>{{ $commo->cus_name }}</td>
                                <td>{{ $commo->cus_tel }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button class="name-button btn btn-info  btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal2" data-id="{{ $commo->id }}"
                                            data-name="{{ $commo->cus_name }}" data-tel="{{ $commo->cus_tel }}"
                                            ><i class="fas fa-edit"></i> Edit</button>
                                        <a href="{{ route('delcustomer', $commo->id) }}" class="btn btn-danger btn-sm"
                                            data-confirm-delete="true"><i class="fas fa-trash"></i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Add Member</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('addcustomer') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="form-floating mb-3">
                            <input type="input" name="name" class="form-control" placeholder="ll" value="" required>
                            <label for="floatingInputValue" class="text-dark">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="input" name="tel" class="form-control" placeholder="ll" value="">
                            <label for="floatingInputValue" class="text-dark">Telephone</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>

                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Edit Member</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('upcustomer') }}" id="formedit" method="post">
                        @csrf
                        @method('post')
                        <input type="hidden" name="id" id="id" class="form-control" placeholder="ll" value="">

                        <div class="form-floating mb-3">
                            <input type="input" name="name1" id="name" class="form-control" placeholder="ll" value="" required>
                            <label for="floatingInputValue" class="text-dark">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="input" name="tel1" id="tel" class="form-control" placeholder="ll" value="">
                            <label for="floatingInputValue" class="text-dark">Telephone</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>

                </div>
                </form>
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
            $(document).ready(function() {
                $('#dataTable').DataTable({

                    "dom": "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    "buttons": [{
                            "extend": 'copy',
                            "charset": 'utf-8',
                            "className": 'btn btn-danger'
                        },
                        {
                            "extend": 'excel',
                            "exportOptions": {
                                "stripHtml": false,
                                'columns': [0, 1, 2, 3]

                            },
                            "charset": 'utf-8',
                            "className": 'btn btn-danger'
                        },
                        {
                            "extend": 'print',
                            "exportOptions": {
                                "stripHtml": false,
                                'columns': [0, 1, 2, 3]

                            },
                            "charset": 'utf-8',
                            "className": 'btn btn-danger'
                        },

                    ]
                });
            });
            $(".name-button").click(function(event) {
                $('.modal-header h1.modal-title').html("Edit, " + $(this).attr('data-name'));
                $('#id').val($(this).attr('data-id'));
                $('#name').val($(this).attr('data-name'));
                $('#tel').val($(this).attr('data-tel'));
            });
            //setInterval(function() {
            //$("#dataTable").load(" #dataTable");
            //}, 5000);
        });
    </script>
@endsection
