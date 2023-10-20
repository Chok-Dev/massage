@extends('layouts.dashboard')
@section('title')
    Calendar
@endsection
@section('css')
    <style>
        table,
        tr,
        td {
            height: 50px;
        }
        .popover {
            min-width: 500px;
            max-width: 1000px;
        }

        .tooltip .tooltip-inner {
            background: rgb(255, 255, 255);
            color: black;
            border: 3px solid black;
            padding: 10px;
            line-height: 1.65em;
        }

        .tooltip.right .tooltip-arrow {
            top: 50%;
            left: 0;
            margin-top: -15px;
            border-right-color: white;
            border-width: 15px 15px 15px 0;
        }

        .tooltip.right .tooltip-arrow:after {
            content: " ";
            position: absolute;
            z-index: -1;
            width: 0;
            height: 0;
            border-top: 15px solid transparent;
            border-bottom: 15px solid transparent;
            border-right: 15px solid black;
            top: -15px;
            left: -3px;
        }

        .form-floating .select2-container--bootstrap-5 .select2-selection {
            height: calc(3.5rem + 2px);
            padding: 1rem 0.75rem;
        }

        .form-floating .select2-container--bootstrap-5 .select2-selection>.select2-selection__rendered {
            margin-top: 0.6rem;
            margin-left: 0.25rem;
        }
    </style>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/locales-all.global.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js'></script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var initialLocaleCode = 'zh-cn';
                var localeSelectorEl = document.getElementById('locale-selector');
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridWeek',
                    slotMinTime: '06:00:00',
                    slotMaxTime: '24:00:00',
                    themeSystem: 'bootstrap5',
                    slotDuration: '00:15',
                    longPressDelay: 500,
                    selectLongPressDelay: 500,
                    eventLongPressDelay: 500,
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                    },
                    locale: initialLocaleCode,
                    height: 'auto',
                    events: @json($events),
                    editable: true,
                    navLinks: true,
                    selectable: true,
                    selectMirror: true,
                    droppable: true,
                    eventDidMount: function(info) {
                        if (!info.isMirror) {
                            $(info.el).popover({
                                html: true,
                                title: info.event.extendedProps.s + " - " + info.event.extendedProps.e,
                                content: info.event.extendedProps.description,
                                placement: "top",
                                trigger: "hover",
                                container: "body"
                            });
                        }
                        
                    },
                    eventDrop: function(info) {
                        //console.log(info.event.startStr)
                        $.ajax({
                            url: "{{url('/')}}/drop",
                            type: 'POST',
                            data: {
                                id: info.event.id,
                                start: info.event.startStr,
                                end: info.event.endStr,
                                // time_start: time_start,
                                // time_end: time_end,
                            },
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                
                                //console.log(response)
                                //window.location.reload();
                            },
                            error: function() {
                                // alert("erreur drag !!!!");
                            }
                        });


                    },
                    eventResize: function(info) {
                        $.ajax({
                            url: "{{url('/')}}/drop",
                            type: 'POST',
                            data: {
                                id: info.event.id,
                                start: info.event.startStr,
                                end: info.event.endStr,

                                // time_start: time_start,
                                // time_end: time_end,
                            },
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                //console.log(response)
                                // window.location.reload();

                            },
                            error: function() {
                                // alert("erreur drag !!!!");
                            }
                        });
                    },
                    eventClick: function(arg) { //แก้ไข
                        //console.log(arg.event.startStr)
                        $('#id1').val(arg.event.id);
                        $('#customer1').val(arg.event.extendedProps.cus_id).trigger('change');
                        $('#details1').val(arg.event.extendedProps.details);
                        $('#employee1').val(arg.event.extendedProps.employee).trigger('change');
                        $('#massage1').val(arg.event.extendedProps.massage_id).trigger('change');
                        var url = '{{ route('delevent', ':arg.event.id') }}';
                        url = url.replace(':arg.event.id', arg.event.id);
                        document.getElementById('del').href = url;
                        $('#exampleModal').modal('show');

                    },
                    select: function(arg) { //เพิ่ม
                        $('#time_start').val(arg.start.toLocaleTimeString('it-IT'));
                        $('#time_end').val(arg.end.toLocaleTimeString('it-IT'));
                        $('#ss').val(arg.startStr);
                        $('#ee').val(arg.endStr);
                        $('#exampleModal2').modal('show');


                    },
                });
                calendar.render();
                calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
                    var optionEl = document.createElement('option');
                    optionEl.value = localeCode;
                    optionEl.selected = localeCode == initialLocaleCode;
                    optionEl.innerText = localeCode;
                    localeSelectorEl.appendChild(optionEl);
                });
                localeSelectorEl.addEventListener('change', function() {
                    if (this.value) {
                        calendar.setOption('locale', this.value);
                    }
                });
            });
        </script>
    @endpush
@endsection
@section('body')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Calendar</h1>
    </div>
    <select class="form-control" id='locale-selector' style="width: 95px"></select>
    <div id="refresh">
        <div id="calendar"></div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Create new event?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('add') }}" method="POST">
                        @csrf
                        @method('post')
                        <input type="hidden" class="form-control" name="start" id="ss" placeholder="ll"
                            value="">
                        <input type="hidden" class="form-control" name="end" id="ee" placeholder="ll"
                            value="">
                        {{--
                        <div class="form-floating mb-3">
                            <input type="input" class="form-control" name="customer_name" id="customer_name" placeholder="ll" value="">
                            <label for="floatingInputValue" class="text-dark">Customer Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="input" class="form-control" name="customer_tel" id="customer_tel" placeholder="ll" value="">
                            <label for="floatingInputValue" class="text-dark">Customer Tel</label>
                        </div>
                        --}}
                        <div class="form-floating mb-3">
                            <select class="form-select " name="customer" id="customer" name="status"
                                aria-label="Floating label select example" required>
                                {{ $cu = DB::table('customers')->get() }}
                                @foreach ($cu as $cus)
                                    <option value="{{ $cus->id }}">{{ $cus->id }} : {{ $cus->cus_name }}</option>
                                @endforeach
                            </select>
                            <label for="floatingInputValue" class="text-dark">Customer</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select " name="massage" id="massage" name="status"
                                aria-label="Floating label select example" required>
                                {{ $mas = DB::table('massages')->get() }}
                                @foreach ($mas as $massage)
                                    <option value="{{ $massage->id }}">{{ $massage->massage_name }} -
                                        ${{ $massage->massage_price }}</option>
                                @endforeach
                            </select>
                            <label for="floatingInputValue" class="text-dark">Massage</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select " name="employee" id="employee" name="status"
                                aria-label="Floating label select example" required>
                                {{ $sta = DB::table('employees')->get() }}
                                @foreach ($sta as $status)
                                    <option value="{{ $status->id }}">{{ $status->emp_name }}</option>
                                @endforeach
                            </select>
                            <label for="floatingInputValue" class="text-dark">Employee</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="time" class="form-control" name="time_start" id="time_start" placeholder="ll"
                                value=" arg.start.toLocaleTimeString('it-IT') + '" required>
                            <label for="floatingInputValue" class="text-dark">Time Start</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="time" class="form-control" name="time_end" id="time_end" placeholder="ll"
                                value="
                            arg.end.toLocaleTimeString('it-IT') + '" required>
                            <label for="floatingInputValue" class="text-dark">Time End</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="details" id="details" placeholder="ll" style="height: 100px"></textarea>
                            <label for="floatingInputValue" class="text-dark">Details</label>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Edit event?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('update') }}" method="POST">
                        @csrf
                        @method('post')
                        <input type="hidden" class="form-control" name="id" id="id1" placeholder="ll"
                            value="">

                        <div class="form-floating mb-3">
                            <select class="form-select " name="customer" id="customer1" name="status"
                                aria-label="Floating label select example" required>
                                {{ $cu = DB::table('customers')->get() }}
                                @foreach ($cu as $cus)
                                    <option value="{{ $cus->id }}">{{ $cus->id }} : {{ $cus->cus_name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="floatingInputValue" class="text-dark">Customer</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select " name="massage" id="massage1" name="status"
                                aria-label="Floating label select example" required>
                                {{ $mas = DB::table('massages')->get() }}
                                @foreach ($mas as $massage)
                                    <option value="{{ $massage->id }}">{{ $massage->massage_name }} -
                                        ${{ $massage->massage_price }}</option>
                                @endforeach
                            </select>
                            <label for="floatingInputValue" class="text-dark">Massage</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="employee" id="employee1" name="status"
                                aria-label="Floating label select example">
                                {{ $sta = DB::table('employees')->get() }}
                                @foreach ($sta as $status)
                                    <option value="{{ $status->id }}">{{ $status->emp_name }}</option>
                                @endforeach
                            </select>
                            <label for="floatingInputValue" class="text-dark">Employee</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="details" id="details1" placeholder="ll" style="height: 100px"></textarea>
                            <label for="floatingInputValue" class="text-dark">Details</label>
                        </div>

                </div>
                <div class="modal-footer">
                    <a href="" id="del" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>


                </div>
                </form>
            </div>
        </div>
    </div>
    @stack('scripts')
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $(document).ready(function() {

                $('#employee').select2({
                    theme: "bootstrap-5",
                    dropdownParent: $('#exampleModal2')
                });
                $('#customer').select2({
                    theme: "bootstrap-5",
                    dropdownParent: $('#exampleModal2')
                });
                $('#massage').select2({
                    theme: "bootstrap-5",
                    dropdownParent: $('#exampleModal2')
                });

                $('#employee1').select2({
                    theme: "bootstrap-5",
                    dropdownParent: $('#exampleModal')
                });
                $('#customer1').select2({
                    theme: "bootstrap-5",
                    dropdownParent: $('#exampleModal')
                });
                $('#massage1').select2({
                    theme: "bootstrap-5",
                    dropdownParent: $('#exampleModal')
                });

            });

            //setInterval(function() {
            //$("#dataTable").load(" #dataTable");
            //}, 5000);
        });
    </script>
@endsection
