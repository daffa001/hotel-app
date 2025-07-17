<script src="/bs/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
        pagination: {
            el: '.swiper-pagination',
        },
        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });
</script>
<script>
        window.addEventListener("scroll", function() {
    var navbar = document.querySelector(".navbar");
    if (window.scrollY > 0) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
    });

    window.addEventListener('resize', function() {
    toggleDropdownPosition();
});

// Mengatur posisi dropdown berdasarkan ukuran layar
function toggleDropdownPosition() {
var dropdownMenu = document.querySelector('.dropdown-menu');

if (window.innerWidth < 992) {
    dropdownMenu.classList.remove('dropdown-menu-end');
    dropdownMenu.classList.add('dropdown-menu-start');
} else {
    dropdownMenu.classList.remove('dropdown-menu-start');
    dropdownMenu.classList.add('dropdown-menu-end');
}
}
toggleDropdownPosition();
</script>

<script>
// Booking Date Management
function disableBookedDates(roomId, targetInput, inputType = 'both') {
    const url = roomId ? `/api/booked-dates?room_id=${roomId}` : '/api/booked-dates';
    
    console.log('Fetching booked dates for room:', roomId, 'URL:', url);
    
    fetch(url, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            console.log('Response status:', response.status, response.statusText);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Received booked dates data:', data);
            
            const disabledDates = data.disabled_dates || [];
            const roomSpecificDates = data.room_specific_dates || {};
            const today = new Date().toISOString().split('T')[0];
            
            console.log('Disabled dates:', disabledDates);
            console.log('Room specific dates:', roomSpecificDates);
            
            // Set minimum date to today
            targetInput.setAttribute('min', today);
            
            // Store disabled dates in data attributes for reference
            targetInput.setAttribute('data-disabled-dates', JSON.stringify(disabledDates));
            targetInput.setAttribute('data-room-specific-dates', JSON.stringify(roomSpecificDates));
            
            // Create event listener for date validation
            targetInput.addEventListener('input', function() {
                console.log('Input event triggered for date:', this.value);
                validateSelectedDate(this, roomId, inputType);
            });
            
            targetInput.addEventListener('change', function() {
                console.log('Change event triggered for date:', this.value);
                validateSelectedDate(this, roomId, inputType);
            });
            
            // Add visual styling for better UX
            targetInput.style.borderColor = '#ced4da';
        })
        .catch(error => {
            console.error('Error fetching booked dates:', error);
        });
}

// Enhanced date validation function
function validateSelectedDate(input, roomId, inputType) {
    const selectedDate = input.value;
    console.log('Validating date:', selectedDate, 'for room:', roomId, 'input type:', inputType);
    
    if (!selectedDate) return true;
    
    const disabledDates = JSON.parse(input.getAttribute('data-disabled-dates') || '[]');
    const roomSpecificDates = JSON.parse(input.getAttribute('data-room-specific-dates') || '{}');
    
    console.log('Checking against disabled dates:', disabledDates);
    console.log('Room specific dates:', roomSpecificDates);
    
    // Check if date is in the past
    const today = new Date().toISOString().split('T')[0];
    if (selectedDate < today) {
        console.log('Date is in the past');
        showDateError(input, 'Tidak dapat memilih tanggal yang sudah berlalu.');
        return false;
    }
    
    // For specific room booking, check if the exact room is booked
    if (roomId && roomSpecificDates[selectedDate]) {
        console.log('Room specific check - room booked on this date:', roomSpecificDates[selectedDate]);
        if (roomSpecificDates[selectedDate].includes(parseInt(roomId))) {
            console.log('This specific room is booked on this date');
            showDateError(input, 'Kamar ini sudah dibooking pada tanggal tersebut. Silakan pilih tanggal lain.');
            return false;
        }
    }
    
    // For general searches, inform if date has limited availability
    if (!roomId && disabledDates.includes(selectedDate)) {
        console.log('General search - date has limited availability');
        const bookedRoomsCount = roomSpecificDates[selectedDate] ? roomSpecificDates[selectedDate].length : 0;
        if (bookedRoomsCount > 0) {
            showDateWarning(input, `Beberapa kamar sudah dibooking pada tanggal ini. Ketersediaan terbatas.`);
        }
    }
    
    // Check if date is in general disabled dates list
    if (disabledDates.includes(selectedDate)) {
        console.log('Date is in disabled dates list');
        if (roomId) {
            // For specific room, we already checked above
            console.log('Specific room booking - allowing if room not specifically booked');
        } else {
            console.log('General search - showing warning about limited availability');
        }
    }
    
    // Reset styling for valid dates
    input.style.borderColor = '#ced4da';
    console.log('Date validation completed - date is valid');
    return true;
}

// Show error message and reset input
function showDateError(input, message) {
    alert(message);
    input.value = '';
    input.style.borderColor = '#dc3545';
    input.focus();
}

// Show warning message but keep the date
function showDateWarning(input, message) {
    // Create or update warning message
    let warningMsg = input.parentElement.querySelector('.date-warning');
    if (!warningMsg) {
        warningMsg = document.createElement('small');
        warningMsg.className = 'date-warning text-warning mt-1';
        input.parentElement.appendChild(warningMsg);
    }
    warningMsg.textContent = message;
    
    // Remove warning after 5 seconds
    setTimeout(() => {
        if (warningMsg && warningMsg.parentElement) {
            warningMsg.remove();
        }
    }, 5000);
}

// Check date range for overlapping bookings
function validateDateRange(checkInInput, checkOutInput, roomId) {
    const checkInDate = checkInInput.value;
    const checkOutDate = checkOutInput.value;
    
    if (!checkInDate || !checkOutDate) return true;
    
    const disabledDates = JSON.parse(checkInInput.getAttribute('data-disabled-dates') || '[]');
    const roomSpecificDates = JSON.parse(checkInInput.getAttribute('data-room-specific-dates') || '{}');
    
    // Generate all dates in the range
    const startDate = new Date(checkInDate);
    const endDate = new Date(checkOutDate);
    const dateRange = [];
    
    const currentDate = new Date(startDate);
    while (currentDate <= endDate) {
        dateRange.push(currentDate.toISOString().split('T')[0]);
        currentDate.setDate(currentDate.getDate() + 1);
    }
    
    // Check for conflicts in the range
    for (const date of dateRange) {
        if (roomId && roomSpecificDates[date] && roomSpecificDates[date].includes(parseInt(roomId))) {
            showDateError(checkOutInput, `Kamar ini sudah dibooking pada rentang tanggal yang dipilih (${date}). Silakan pilih tanggal lain.`);
            return false;
        }
    }
    
    return true;
}

// Initialize date blocking when document is ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Content Loaded - Initializing date blocking');
    const today = new Date().toISOString().split('T')[0];
    console.log('Today date:', today);
    
    // Set minimum date to today for all date inputs
    const allDateInputs = document.querySelectorAll('input[type="date"]');
    console.log('Found date inputs:', allDateInputs.length);
    allDateInputs.forEach(function(input) {
        input.setAttribute('min', today);
        console.log('Set min date for input:', input.name, input.id);
    });
    
    // Handle room-specific booking forms (modal forms)
    const roomIdInput = document.querySelector('input[name="room"]');
    console.log('Room ID input found:', roomIdInput);
    if (roomIdInput) {
        const roomId = roomIdInput.value;
        console.log('Room ID:', roomId);
        const checkInInput = document.querySelector('input[name="from"]');
        const checkOutInput = document.querySelector('input[name="to"]');
        
        console.log('Check-in input found:', checkInInput);
        console.log('Check-out input found:', checkOutInput);
        
        if (checkInInput) {
            console.log('Setting up date blocking for check-in input');
            disableBookedDates(roomId, checkInInput, 'checkin');
        }
        if (checkOutInput) {
            console.log('Setting up date blocking for check-out input');
            disableBookedDates(roomId, checkOutInput, 'checkout');
        }
        
        // Add range validation for room-specific bookings
        if (checkInInput && checkOutInput) {
            checkOutInput.addEventListener('change', function() {
                validateDateRange(checkInInput, checkOutInput, roomId);
            });
        }
    }
    
    // Handle general room search forms (homepage, rooms page)
    const generalForms = document.querySelectorAll('form[action="/rooms"], form[action*="rooms"]');
    console.log('Found general forms:', generalForms.length);
    generalForms.forEach(function(form) {
        const checkInInput = form.querySelector('input[name="from"], #from');
        const checkOutInput = form.querySelector('input[name="to"], #to');
        
        console.log('General form - check-in input:', checkInInput);
        console.log('General form - check-out input:', checkOutInput);
        
        if (checkInInput && !roomIdInput) {
            console.log('Setting up general date blocking for check-in input');
            disableBookedDates(null, checkInInput, 'checkin');
        }
        if (checkOutInput && !roomIdInput) {
            console.log('Setting up general date blocking for check-out input');
            disableBookedDates(null, checkOutInput, 'checkout');
        }
    });
    
    // Fallback: Handle any remaining date inputs that weren't caught above
    const remainingDateInputs = document.querySelectorAll('input[type="date"]:not([data-disabled-dates])');
    console.log('Remaining date inputs to process:', remainingDateInputs.length);
    remainingDateInputs.forEach(function(input) {
        console.log('Processing remaining input:', input.name, input.id);
        // Determine if this is a room-specific or general form
        const formElement = input.closest('form');
        const roomInput = formElement ? formElement.querySelector('input[name="room"]') : null;
        const roomId = roomInput ? roomInput.value : null;
        
        console.log('Remaining input - room ID:', roomId);
        disableBookedDates(roomId, input, 'both');
    });
    
    // Handle check-out date minimum based on check-in date
    const checkInInputs = document.querySelectorAll('input[name="from"], #from, #check_in');
    const checkOutInputs = document.querySelectorAll('input[name="to"], #to, #check_out');
    
    checkInInputs.forEach(function(checkIn) {
        checkIn.addEventListener('change', function() {
            const checkInDate = new Date(this.value);
            const nextDay = new Date(checkInDate);
            nextDay.setDate(nextDay.getDate() + 1);
            const minCheckOut = nextDay.toISOString().split('T')[0];
            
            checkOutInputs.forEach(function(checkOut) {
                // Only update if it's the corresponding checkout input
                if (checkOut.closest('form') === checkIn.closest('form') || 
                    (checkIn.id === 'from' && checkOut.id === 'to') ||
                    (checkIn.name === 'from' && checkOut.name === 'to')) {
                    
                    checkOut.setAttribute('min', minCheckOut);
                    if (checkOut.value && checkOut.value <= checkIn.value) {
                        checkOut.value = '';
                    }
                }
            });
        });
    });
});
</script>

@yield('script')
