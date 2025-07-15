@extends('dashboard.layout.main')
@section('title')
    <title>Dashboard | Checkout List</title>
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="container">
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-4">
                <h1 class="h2 mb-0 text-dark-1000">Check Out List</h1>
             
            </div>
        </div>

        <div class="col-md-6">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif
        </div>

    </div>

    <!-- Content Row -->
    <div class="container">
        <div class="card shadow border-0">
            <div class="card-header">
                <h5>Total data {{ $transaction->count() }}</h5>
            </div>
            <div class="card-body">
                <div class="col-md-auto">

                    <table class="table table-responsive table-sm table-bordered" id="myTable">
                        <thead class="table-secondary">
                            <tr>
                                <th width="5%">No</th>
                                <th width="5%">Name</th>
                                <th width="5%">Kamar</th>
                                <th>alamat</th>
                                <th>email</th>
                                <th>Telp</th>
                                <th>Jenis kelamin</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                    {{-- <td>{{ $loop->iteration }}</td> --}}
                                    {{-- <td>1</td>
                                    <td>Andrianto pratama</td>
                                    <td>Standar Room </td>
                                    <td>Bojonggede</td>
                                    <td>prtmandri30@gmail.com</td>
                
                                    <td>083818049105</td>
                                    <td>Laki lakai</td>
                                    <td class='text-primary'>-</td>
                                    <td><button class='btn btn-primary'>Check in</button></td>
                                    <td>
                                    </td>
                                </tr> --}}
                         @foreach ($transaction as $t)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $t->Customer->name ?? '-' }}</td>
                                    <td>{{ $t->Room->type->name }}</td>
                                    <td>{{ $t->Room->no }}</td>
                                    <td>{{ $t->check_in->isoFormat('D MMM Y') }}</td>
                                    <td>{{ $t->check_out->isoFormat('D MMM Y') }}</td>
                                    <td>{{ $t->status }}</td>
                                    <td>
                                        {{-- <form action="/dashboard/checkout/checkoutlist/{{ $t->id }}" method="post">
                                            @if($t->status === 'Reservation')                                       
                                            <button type="submit" class="btn btn-primary" onclick="return confirm(' Yakin ingin melajutkan ?')">Check In</button>
                                             @elseif($t->status === 'Check In')  
                                            <button type="submit" class="btn btn-danger" onclick="return confirm(' Yakin ingin melajutkan ?')">Check Out</button>
                                              @endif
                                        </form> --}}
                                        @if($t->status === 'Reservation')    
                                        <a href="/dashboard/checkout/checkoutlist/{{ $t->id }}" class="btn btn-primary" onclick="return confirm(' Yakin ingin melajutkan ?')">
                                            Check In 
                                        </a>
                                         @elseif($t->status === 'Check In') 
                                                                             
                                        <a href="/dashboard/checkout/checkoutlist/{{ $t->id }}" class="btn btn-danger" onclick="return confirm(' Yakin ingin melajutkan ?')">
                                            Check Out 
                                        </a>
                                        @endif
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function deleteConfirmation(id) {
            swal({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{ url('room') }}/" + id,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {

                            if (results.success === true) {
                                swal("Done!", results.message, "success");
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            })
        }
    </script>
@endsection
<!-- End of Main Content -->
