@extends('frontend.inc.main')

@section('title')
<title>Hotel Kuta | Cart</title>
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container my-5">
    <h2 class="mb-4">Keranjang Pemesanan Kamar</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Jenis Kamar</th>
                    <th>Nomor Kamar</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Harga/Hari</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 0;
                $total = 0;
                @endphp
                @foreach ($his as $h)
                <tr>
                    <td>{{$no=$no+1}}</td>
                    <td>{{ $h->room->type->name }}</td>
                    <td>{{ $h->room->no }}</td>
                    <td><input type="date" class="form-control" value="{{ $h->check_in }}"></td>
                    <td><input type="date" class="form-control" value="{{ $h->check_out }}"></td>
                    <td>{{ $h->room->price }}</td>
                    <td>{{ $h->price }}</td>
                    <td>
                        <form action="/cart/delete" method="POST">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{$h->id}}">
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                    <input type="hidden" value="{{$total=$total+$h->price}}">
                </tr>
                @endforeach
                <tr class="table-secondary fw-bold">
                    <td colspan="6" class="text-end">Total</td>
                    <td colspan="2">Rp {{$total}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <form id="checkout-form" action="/cart/checkout" method="GET">
        @csrf
        <button type="submit" class="btn btn-success">Lanjut ke Checkout</button>
    </form>

    <!-- <script>
        document.getElementById('checkout-btn').addEventListener('click', function() {
            fetch("{{ route('cart.checkStock') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({})
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'ok') {
                        // Semua kamar tersedia, submit form
                        document.getElementById('checkout-form').submit();
                    } else {
                        // Tampilkan alert dan refresh
                        alert(data.message + "\n\n- " + data.rooms.join("\n- "));
                        location.reload();
                    }
                })
                .catch(err => {
                    console.error("Error:", err);
                    alert("Terjadi kesalahan saat memeriksa stok kamar.");
                });
        });
    </script> -->


</div>
@endsection