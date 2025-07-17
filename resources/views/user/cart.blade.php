@extends('frontend.inc.main')

@section('title')
<title>Hotel Kuta | Cart</title>
@endsection

@section('content')
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
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Deluxe</td>
                    <td>101</td>
                    <td><input type="date" class="form-control" value="2025-07-12"></td>
                    <td><input type="date" class="form-control" value="2025-07-14"></td>
                    <td>Rp 1.200.000</td>
                    <td>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Suite</td>
                    <td>202</td>
                    <td><input type="date" class="form-control" value="2025-07-13"></td>
                    <td><input type="date" class="form-control" value="2025-07-15"></td>
                    <td>Rp 2.400.000</td>
                    <td>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Standard</td>
                    <td>305</td>
                    <td><input type="date" class="form-control" value="2025-07-14"></td>
                    <td><input type="date" class="form-control" value="2025-07-16"></td>
                    <td>Rp 800.000</td>
                    <td>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                </tr>
                <tr class="table-secondary fw-bold">
                    <td colspan="5" class="text-end">Total</td>
                    <td colspan="2">Rp 4.400.000</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="text-end mt-3">
        <a href="#" class="btn btn-success">Lanjut ke Checkout</a>
    </div>
</div>
@endsection
