@extends('frontend.inc.main')

@section('title')
<title>Checkout | Hotel Kuta</title>
@endsection

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Konfirmasi Checkout</h2>

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
                    <td>{{ $h->check_in }}</td>
                    <td>{{ $h->check_out }}</td>
                    <td>{{ $h->room->price }}</td>
                    <td>{{ $h->price }}</td>
                    <input type="hidden" value="{{$total=$total+$h->price}}">
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <form action="/cart/post/{{$h->payments_id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="payment_method" class="form-label">Pilih Metode Pembayaran</label>
            <select name="payment_method_id" class="form-select mt-1"
                id="paymentmethod">
                @foreach ($paymentmet as $pay)
                <option value="{{ $pay->id }}">{{ $pay->nama }}</option>
                @endforeach
            </select>
        </div>
        <label for="image" class="mb-2">Upload Bukti <span class="fst-italic">(Max
                3mb)</span></label>
        <input required type="file" class="form-control mb-3" name="image"
            id="image">
        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary">Bayar</button>
        </div>
    </form>
</div>
@endsection