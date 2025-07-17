@extends('frontend.inc.main')
@section('title')
<title>Hotel Kuta | KAMAR #{{ $room->no }}</title>
@endsection

@section('css')
<style>
    @media (max-width: 576px) {
        .room-title {
            font-size: 18px;
        }

        .room-price {
            font-size: 12px;
        }

        .desc-title {
            font-size: 16px;
        }

        .desc-subtitle {
            font-size: 12px;
        }

        .desc-content {
            font-size: 10px;
        }
    }

    @media (min-width: 577px) and (max-width: 992px) {
        .room-title {
            font-size: 22px;
        }

        .room-price {
            font-size: 14px;
        }

        .desc-title {
            font-size: 18px;
        }

        .desc-subtitle {
            font-size: 16px;
        }

        .desc-content {
            font-size: 14px;
        }
    }

    @media (min-width: 993px) {
        .room-title {
            font-size: 26px;
        }

        .room-price {
            font-size: 16px;
        }

        .desc-title {
            font-size: 22px;
        }

        .desc-subtitle {
            font-size: 20px;
        }

        .desc-content {
            font-size: 18px;
        }
    }
</style>
@endsection

@section('content')
<div class="modal fade" id="checkin" tabindex="-1" aria-labelledby="checkinLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="checkinLabel">Kapan?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info" role="alert">
                    <small><i class="fas fa-info-circle"></i> Tanggal yang berwarna merah sudah dibooking dan tidak bisa dipilih</small>
                </div>
                <form method="post" action="/order" id="bookingForm">
                    @csrf
                    <input type="hidden" name="customer" value="{{ $customer }}">
                    <input type="hidden" name="room" value="{{ $room->id }}">
                    <div class="mb-3">
                        <label for="check_in" class="col-form-label">Check in</label>
                        <input type="date" class="form-control" required id="check_in" name="from" min="{{ date('Y-m-d') }}">
                        <div class="invalid-feedback" id="check_in_error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="check_out" class="col-form-label">Check out</label>
                        <input type="date" class="form-control" required id="check_out" name="to" min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                        <div class="invalid-feedback" id="check_out_error"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submitBtn"> Cek Tanggal</button>

                    </div>
                </form>
            </div>


        </div>
    </div>
</div>


<div class="my-5 px-4">
    {{-- <div class="h-line bg-dark"></div> --}}
</div>

<div class="container-fluid">

    <div class="swiper swiper-container">
        <div class="swiper-wrapper">
            @if ($room->images->count() > 0)
            @foreach ($room->images as $room_images)
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $room_images->image) }}" class="image-swipper d-block"
                    alt="{{ $room_images->image }}">
                @endforeach
                @else
                <div class="swiper-slide">
                    <img src="/nyoba/images/carousel/1.png" class="image-swipper d-block" alt="1.png">
                </div>
                @endif
            </div>

            <div class="swiper-pagination"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </div>

    <div class="container py-5">
        <div class="d-flex justify-content-between">
            <div class="col-md-6 col-lg-8 col-8">
                <h2 class="fw-bold h-font room-title">{{ $room->type->name }} {{ $room->no }}</h2>
            </div>
            <div class="col-md-6 col-lg-4 col-4 text-end">
                <h4 class="h-font room-price"><span class="text-success fw-bold"> IDR
                        {{ number_format($room->price) }}</span><span class="text-muted">/night
                    </span></h4>
                <h6 style="font-size:10px" ; class="text-muted">(max. {{ $room->capacity }} Orang) </h6>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-2">
            @if ($request->from)
            <form action="/order" method="POST">
                @csrf
                <input type="hidden" name="customer" value="{{ $customer }}">
                <input type="hidden" name="room" value="{{ $room->id }}">
                <input type="hidden" name="from" value="{{ $request->from }}">
                <input type="hidden" name="to" value="{{ $request->to }}">
                <button type="submit" class="btn btn-custom"> Pesan Sekarang </button>
            </form>
            @else
            <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#checkin"> Pesan
                Sekarang </button>
            @endif
            </form>
        </div>

        <div class="col-md-12">
            <hr class="border border-secondary opacity-25 w-100">
        </div>

        <div class="col-md-12">
            <h4 class="mt-4 mb-4 desc-title"> Kebijakan Akomodasi</h4>
            <div class="d-flex">
                <div class="col-md-4 col-4 col-lg-4">
                    <h5 class="desc-subtitle">Prosedur Check-in</h5>
                </div>
                <div class="col-md-8 desc-content">
                    <p>Check in Jam 14:00</p>
                    <p>Check out Jam 12:00</p>
                </div>
            </div>
            <div class="d-flex">
                <div class="col-md-4 col-4 col-lg-4 mt-4">
                    <h5 class="desc-subtitle">Kebijakan Lainnya</h5>
                </div>
                <div class="col-md-8 desc-content">
                    <h6 class="mt-4 desc-content">Merokok</h6>
                    <p>Dilarang Merokok di ruang tidur, Namun telah disediakan Ruangan Khusus Merokok untuk perokok
                        aktif.</p>
                    <h6 class="mt-4 desc-content">Denda</h6>
                    <p>Checkout tidak boleh melebihi Jam yang telah di tentukan, Jika Pelanggan Checkout melewati Jam
                        yang di tentukan akan dikenakan Charge sebanyak Rp 100.000/Jam</p>
                </div>
            </div>

            <div class="d-flex">
                <div class="col-md-4 col-4 col-lg-4 mt-4">
                    <h5 class="desc-subtitle">Fasilitas</h5>
                </div>
                <div class="col-md-8 desc-content">
                    <h6 class="mt-4 desc-content">Breakfast</h6>
                    <p>Kami memiliki tambahan pelayanan gratis breakfast kepada para pelanggan, Dengan beberapa menu,
                        pelanggan dapat memilih menu breakfast.</p>

                    <h6 class="mt-4 desc-content">Free Wifi</h6>
                    <p>Fasilitas terbaik yang ada pada Hotel kami, Kami menyediakan Fasilitas free wifi dengan kecepatan
                        yang tinggi.</p>

                    <h6 class="mt-4 desc-content">Swimming Pool</h6>
                    <p>Fasilitas kolam renang yang Luas, Bersih dan Memiliki kedalaman untuk semua umur</p>

                    <h6 class="mt-4 desc-content">Lunch</h6>
                    <p>Kami memiliki tambahan pelayanan gratis Lunch kepada para pelanggan, Dengan beberapa menu,
                        pelanggan dapat memilih menu Lunch.</p>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <hr class="border border-secondary opacity-25 w-100">
        </div>

        <div class="col-md-12 mb-5">
            <div class="d-flex justify-content-between mt-4 mb-3">
                <h4> Lokasi </h4>
                <a href=""> Lihat MAPS</a>
            </div>
            <div class="d-flex justify-content-center w-100">
                <div class="col-12">
                    <iframe class="w-100 rounded mt-3" height="320px"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.734492691161!2d106.79730077587176!3d-6.555164864083095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c40de0f72211%3A0xbd963a080fe6b8dd!2sBSI%20Cilebut!5e0!3m2!1sen!2sid!4v1749014498829!5m2!1sen!2sid" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const roomId = {{ $room->id }};
    let bookedDates = [];
    
    // Fetch booked dates for this room
    fetchBookedDates(roomId);
    
    function fetchBookedDates(roomId) {
        fetch(`/api/booked-dates/${roomId}`)
            .then(response => response.json())
            .then(data => {
                bookedDates = data.bookedDates || [];
                setupDateRestrictions();
            })
            .catch(error => {
                console.error('Error fetching booked dates:', error);
                setupDateRestrictions();
            });
    }
    
    function setupDateRestrictions() {
        const checkInInput = document.getElementById('check_in');
        const checkOutInput = document.getElementById('check_out');
        const submitBtn = document.getElementById('submitBtn');
        
        // Set minimum dates
        const today = new Date().toISOString().split('T')[0];
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        const tomorrowStr = tomorrow.toISOString().split('T')[0];
        
        checkInInput.min = today;
        checkOutInput.min = tomorrowStr;
        
        // Add event listeners
        checkInInput.addEventListener('change', function() {
            validateCheckInDate(this.value);
            updateCheckOutMin(this.value);
        });
        
        checkOutInput.addEventListener('change', function() {
            validateCheckOutDate(this.value);
        });
        
        // Form submission validation
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            if (!validateBookingDates()) {
                e.preventDefault();
            }
        });
    }
    
    function validateCheckInDate(selectedDate) {
        const checkInInput = document.getElementById('check_in');
        const checkInError = document.getElementById('check_in_error');
        
        if (isDateBooked(selectedDate)) {
            checkInInput.classList.add('is-invalid');
            checkInError.textContent = 'Tanggal ini sudah dibooking. Silakan pilih tanggal lain.';
            return false;
        } else {
            checkInInput.classList.remove('is-invalid');
            checkInError.textContent = '';
            return true;
        }
    }
    
    function validateCheckOutDate(selectedDate) {
        const checkOutInput = document.getElementById('check_out');
        const checkOutError = document.getElementById('check_out_error');
        const checkInDate = document.getElementById('check_in').value;
        
        if (isDateBooked(selectedDate)) {
            checkOutInput.classList.add('is-invalid');
            checkOutError.textContent = 'Tanggal ini sudah dibooking. Silakan pilih tanggal lain.';
            return false;
        }
        
        if (checkInDate && selectedDate <= checkInDate) {
            checkOutInput.classList.add('is-invalid');
            checkOutError.textContent = 'Tanggal check-out harus setelah tanggal check-in.';
            return false;
        }
        
        // Check if any date in the range is booked
        if (checkInDate && hasBookedDateInRange(checkInDate, selectedDate)) {
            checkOutInput.classList.add('is-invalid');
            checkOutError.textContent = 'Ada tanggal yang sudah dibooking dalam rentang yang dipilih.';
            return false;
        }
        
        checkOutInput.classList.remove('is-invalid');
        checkOutError.textContent = '';
        return true;
    }
    
    function updateCheckOutMin(checkInDate) {
        const checkOutInput = document.getElementById('check_out');
        if (checkInDate) {
            const nextDay = new Date(checkInDate);
            nextDay.setDate(nextDay.getDate() + 1);
            checkOutInput.min = nextDay.toISOString().split('T')[0];
            
            // Clear checkout if it's now invalid
            if (checkOutInput.value && checkOutInput.value <= checkInDate) {
                checkOutInput.value = '';
            }
        }
    }
    
    function isDateBooked(date) {
        return bookedDates.includes(date);
    }
    
    function hasBookedDateInRange(startDate, endDate) {
        const start = new Date(startDate);
        const end = new Date(endDate);
        
        for (let d = new Date(start); d < end; d.setDate(d.getDate() + 1)) {
            const dateStr = d.toISOString().split('T')[0];
            if (isDateBooked(dateStr)) {
                return true;
            }
        }
        return false;
    }
    
    function validateBookingDates() {
        const checkInDate = document.getElementById('check_in').value;
        const checkOutDate = document.getElementById('check_out').value;
        
        if (!checkInDate || !checkOutDate) {
            alert('Silakan pilih tanggal check-in dan check-out.');
            return false;
        }
        
        const checkInValid = validateCheckInDate(checkInDate);
        const checkOutValid = validateCheckOutDate(checkOutDate);
        
        return checkInValid && checkOutValid;
    }
});
</script>

<style>
/* Style for booked dates indication */
.alert-info {
    background-color: #d1ecf1;
    border-color: #bee5eb;
    color: #0c5460;
}

.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    display: block;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 0.875em;
    color: #dc3545;
}

/* Custom styles for date inputs to show booked dates */
input[type="date"]::-webkit-calendar-picker-indicator {
    color: rgba(0, 0, 0, 0);
    opacity: 1;
    display: block;
    background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 7V3m8 4V3M2 11h12M2 7h12M4 1v2m8-2v2'/%3e%3c/svg%3e") no-repeat;
    background-size: 16px 16px;
    width: 16px;
    height: 16px;
    cursor: pointer;
}

.date-input-wrapper {
    position: relative;
}

.booked-dates-indicator {
    position: absolute;
    top: -10px;
    right: 5px;
    background: #dc3545;
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
}
</style>

@endsection