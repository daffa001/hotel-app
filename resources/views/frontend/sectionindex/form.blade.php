<div class="container availability-form">
    <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class="col-lg-4">Check Ketersediaan Kamar</h5>
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <form method="get" action="/rooms">
                @csrf
                <div class="row align-items-end justify-content-center">

                    <div class="col-lg-4 mb-3">
                        <select class="form-select" name="type_id" id="type_id">

                            <option value="">-- All Types --</option> {{-- <-- Tambahan ini --}}
                            @foreach ($type as $t)
                            <option name="type_id" value="{{ $t->id }}"
                                {{ request('type_id') == $t->id ? 'selected' : '' }}>
                                {{ $t->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label" style="font-weight: 500;">Check-in</label>
                        <input type="date" name="from" id="from" class="form-control shadow-none" required>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label" style="font-weight: 500;">Check-out</label>
                        <input type="date" name="to" id="to" class="form-control shadow-none" required>
                    </div>

                    <div class="col-lg-1 mb-3">
                        <label class="form-label" style="font-weight: 500;">Quantity</label>
                        <input type="number" value="1" name="quantity" class="form-control shadow-none" required>
                    </div>
                    <div class="col-lg-1 mb-3">
                        <label class="form-label" style="font-weight: 500;">Tamu</label>
                        <input type="number" name="count" class="form-control shadow-none" id="count" value="1" required>
                    </div>
                    <div class="col-lg-1 mb-lg-3 mt-2">
                        <button type="submit" class="btn shadow-none border">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        const from = document.querySelector('[name="from"]').value.trim();
        const to = document.querySelector('[name="to"]').value.trim();
        const quantity = document.querySelector('[name="quantity"]').value.trim();
        const count = document.querySelector('[name="count"]').value.trim();
        const typeId = document.querySelector('[name="type_id"]').value.trim();

        if (!from && !to && !quantity && !count && !typeId) {
            e.preventDefault();
            alert('Harap isi minimal satu kolom pencarian.');
        }
    });
</script>