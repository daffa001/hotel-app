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
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            const disabledDates = data.disabled_dates || [];
            const roomSpecificDates = data.room_specific_dates || {};
            const today = new Date().toISOString().split('T')[0];
            
            // Set minimum date to today
            targetInput.setAttribute('min', today);
            
            // Store disabled dates in data attributes for reference
            targetInput.setAttribute('data-disabled-dates', JSON.stringify(disabledDates));
            targetInput.setAttribute('data-room-specific-dates', JSON.stringify(roomSpecificDates));
            
            // Create event listener for date validation
            targetInput.addEventListener('input', function() {
                validateSelectedDate(this, roomId, inputType);
            });
            
            targetInput.addEventListener('change', function() {
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
    if (!selectedDate) return true;
    
    const disabledDates = JSON.parse(input.getAttribute('data-disabled-dates') || '[]');
    const roomSpecificDates = JSON.parse(input.getAttribute('data-room-specific-dates') || '{}');
    
    // Check if date is in the past
    const today = new Date().toISOString().split('T')[0];
    if (selectedDate < today) {
        showDateError(input, 'Tidak dapat memilih tanggal yang sudah berlalu.');
        return false;
    }
    
    // For specific room booking, check if the exact room is booked
    if (roomId && roomSpecificDates[selectedDate]) {
        if (roomSpecificDates[selectedDate].includes(parseInt(roomId))) {
            showDateError(input, 'Kamar ini sudah dibooking pada tanggal tersebut. Silakan pilih tanggal lain.');
            return false;
        }
    }
    
    // For general searches, inform if date has limited availability
    if (!roomId && disabledDates.includes(selectedDate)) {
        const bookedRoomsCount = roomSpecificDates[selectedDate] ? roomSpecificDates[selectedDate].length : 0;
        if (bookedRoomsCount > 0) {
            showDateWarning(input, `Beberapa kamar sudah dibooking pada tanggal ini. Ketersediaan terbatas.`);
        }
    }
    
    // Reset styling for valid dates
    input.style.borderColor = '#ced4da';
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
    const today = new Date().toISOString().split('T')[0];
    
    // Set minimum date to today for all date inputs
    const allDateInputs = document.querySelectorAll('input[type="date"]');
    allDateInputs.forEach(function(input) {
        input.setAttribute('min', today);
    });
    
    // Handle room-specific booking forms (modal forms)
    const roomIdInput = document.querySelector('input[name="room"]');
    if (roomIdInput) {
        const roomId = roomIdInput.value;
        const checkInInput = document.querySelector('input[name="from"]');
        const checkOutInput = document.querySelector('input[name="to"]');
        
        if (checkInInput) {
            disableBookedDates(roomId, checkInInput, 'checkin');
        }
        if (checkOutInput) {
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
    generalForms.forEach(function(form) {
        const checkInInput = form.querySelector('input[name="from"], #from');
        const checkOutInput = form.querySelector('input[name="to"], #to');
        
        if (checkInInput && !roomIdInput) {
            disableBookedDates(null, checkInInput, 'checkin');
        }
        if (checkOutInput && !roomIdInput) {
            disableBookedDates(null, checkOutInput, 'checkout');
        }
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
