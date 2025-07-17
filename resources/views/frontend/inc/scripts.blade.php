<script src="/bs/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- CSS untuk styling tanggal yang diblokir -->
<style>
/* Styling untuk input tanggal yang memiliki tanggal terblokir */
.date-input-blocked {
    position: relative;
}

/* Overlay untuk tanggal yang diblokir */
.date-blocked-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(220, 53, 69, 0.1);
    border: 2px solid #dc3545;
    border-radius: 4px;
    pointer-events: none;
    z-index: 1;
}

/* Styling untuk tanggal input yang memiliki tanggal terblokir */
input[type="date"].has-blocked-dates {
    border-color: #ffc107;
    background-color: #fff3cd;
}

input[type="date"].has-blocked-dates:focus {
    border-color: #ffcd39;
    box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
}

/* Styling untuk tanggal yang sepenuhnya terblokir */
input[type="date"].fully-blocked {
    border-color: #dc3545;
    background-color: #f8d7da;
    color: #721c24;
}

input[type="date"].fully-blocked:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

/* Pesan warning untuk tanggal */
.date-warning {
    font-size: 0.875rem;
    margin-top: 0.25rem;
    display: block;
}

.date-warning.text-warning {
    color: #856404 !important;
}

.date-warning.text-danger {
    color: #721c24 !important;
}

.date-warning.text-info {
    color: #0c5460 !important;
}

/* Tooltip untuk tanggal yang diblokir */
.date-tooltip {
    position: relative;
    display: inline-block;
}

.date-tooltip .tooltiptext {
    visibility: hidden;
    width: 200px;
    background-color: #555;
    color: white;
    text-align: center;
    border-radius: 6px;
    padding: 5px;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -100px;
    opacity: 0;
    transition: opacity 0.3s;
    font-size: 12px;
}

.date-tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.date-tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

/* Styling untuk disabled date inputs */
input[type="date"]:disabled {
    background-color: #e9ecef;
    opacity: 0.6;
    cursor: not-allowed;
}
</style>
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
// Booking Date Management dengan Visual Blocking
function disableBookedDates(roomId, targetInput, inputType = 'both') {
    const url = roomId ? `/api/booked-dates?room_id=${roomId}` : '/api/booked-dates';
    
    // console.log('Setting up visual date blocking for room:', roomId, 'URL:', url);
    
    fetch(url, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            // console.log('Response status:', response.status, response.statusText);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            // console.log('Received booked dates data:', data);
            
            const disabledDates = data.disabled_dates || [];
            const roomSpecificDates = data.room_specific_dates || {};
            const today = new Date().toISOString().split('T')[0];
            
            // console.log('Disabled dates:', disabledDates);
            // console.log('Room specific dates:', roomSpecificDates);
            
            // Set minimum date to today
            targetInput.setAttribute('min', today);
            
            // Store disabled dates in data attributes for reference
            targetInput.setAttribute('data-disabled-dates', JSON.stringify(disabledDates));
            targetInput.setAttribute('data-room-specific-dates', JSON.stringify(roomSpecificDates));
            targetInput.setAttribute('data-room-id', roomId || '');
            
            // Apply visual styling based on blocked dates
            applyVisualBlocking(targetInput, disabledDates, roomSpecificDates, roomId);
            
            // Setup date validation with blocking
            setupDateValidation(targetInput, roomId, inputType);
            
        })
        .catch(error => {
            console.error('Error fetching booked dates:', error);
        });
}

// Apply visual styling untuk tanggal yang diblokir
function applyVisualBlocking(input, disabledDates, roomSpecificDates, roomId) {
    // Create wrapper untuk tooltip jika belum ada
    if (!input.parentElement.classList.contains('date-tooltip')) {
        const wrapper = document.createElement('div');
        wrapper.className = 'date-tooltip';
        input.parentElement.insertBefore(wrapper, input);
        wrapper.appendChild(input);
        
        // Create tooltip text
        const tooltip = document.createElement('span');
        tooltip.className = 'tooltiptext';
        wrapper.appendChild(tooltip);
    }
    
    // Update styling berdasarkan data
    if (roomId && Object.keys(roomSpecificDates).length > 0) {
        // Untuk booking kamar spesifik
        const hasBlockedDates = Object.keys(roomSpecificDates).some(date => 
            roomSpecificDates[date].includes(parseInt(roomId))
        );
        
        if (hasBlockedDates) {
            input.classList.add('has-blocked-dates');
            updateTooltip(input, 'Beberapa tanggal tidak tersedia untuk kamar ini');
        }
    } else if (disabledDates.length > 0) {
        // Untuk pencarian umum
        input.classList.add('has-blocked-dates');
        updateTooltip(input, `${disabledDates.length} tanggal memiliki ketersediaan terbatas`);
    }
}

// Update tooltip content
function updateTooltip(input, message) {
    const wrapper = input.closest('.date-tooltip');
    if (wrapper) {
        const tooltip = wrapper.querySelector('.tooltiptext');
        if (tooltip) {
            tooltip.textContent = message;
        }
    }
}

// Setup date validation dengan blocking visual
function setupDateValidation(input, roomId, inputType) {
    // Remove existing event listeners to prevent duplicates
    const newInput = input.cloneNode(true);
    input.parentNode.replaceChild(newInput, input);
    
    // Add new event listeners
    newInput.addEventListener('input', function(e) {
        validateAndBlockDate(this, roomId, inputType, e);
    });
    
    newInput.addEventListener('change', function(e) {
        validateAndBlockDate(this, roomId, inputType, e);
    });
    
    newInput.addEventListener('click', function(e) {
        validateAndBlockDate(this, roomId, inputType, e);
    });
    
    // Prevent manual typing of blocked dates
    newInput.addEventListener('keydown', function(e) {
        // Allow navigation keys
        const allowedKeys = ['Tab', 'Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown'];
        if (allowedKeys.includes(e.key)) {
            return;
        }
        
        // Block other keys to prevent manual date entry
        if (this.classList.contains('fully-blocked')) {
            e.preventDefault();
        }
    });
}

// Fungsi untuk validasi dan blocking tanggal dengan visual feedback
function validateAndBlockDate(input, roomId, inputType, event) {
    const selectedDate = input.value;
    // console.log('Validating and blocking date:', selectedDate, 'for room:', roomId);
    
    if (!selectedDate) {
        clearDateStyling(input);
        return true;
    }
    
    const disabledDates = JSON.parse(input.getAttribute('data-disabled-dates') || '[]');
    const roomSpecificDates = JSON.parse(input.getAttribute('data-room-specific-dates') || '{}');
    
    // Check if date is in the past
    const today = new Date().toISOString().split('T')[0];
    if (selectedDate < today) {
        // console.log('Date is in the past - blocking');
        blockDateSelection(input, 'Tidak dapat memilih tanggal yang sudah berlalu', 'past');
        return false;
    }
    
    // For specific room booking, check if the exact room is booked
    if (roomId && roomSpecificDates[selectedDate]) {
        if (roomSpecificDates[selectedDate].includes(parseInt(roomId))) {
            // console.log('Room specifically booked on this date - blocking');
            blockDateSelection(input, 'Kamar ini sudah dibooking pada tanggal tersebut', 'booked');
            return false;
        }
    }
    
    // For general searches, check availability
    if (!roomId && disabledDates.includes(selectedDate)) {
        const bookedRoomsCount = roomSpecificDates[selectedDate] ? roomSpecificDates[selectedDate].length : 0;
        if (bookedRoomsCount > 0) {
            showAvailabilityWarning(input, `${bookedRoomsCount} kamar sudah dibooking pada tanggal ini`);
            return true; // Allow selection but show warning
        }
    }
    
    // Date is valid
    clearDateStyling(input);
    clearDateMessages(input);
    // console.log('Date is valid');
    return true;
}

// Block date selection dengan visual feedback
function blockDateSelection(input, message, type) {
    // Clear the input value
    input.value = '';
    
    // Apply styling based on block type
    if (type === 'booked') {
        input.classList.remove('has-blocked-dates');
        input.classList.add('fully-blocked');
    } else if (type === 'past') {
        input.classList.add('fully-blocked');
    }
    
    // Show message below input
    showDateMessage(input, message, 'danger');
    
    // Update tooltip
    updateTooltip(input, message);
    
    // Temporarily disable input to prevent immediate re-selection
    input.setAttribute('data-blocked-until', Date.now() + 1000); // Block for 1 second
    
    // Focus on input after a short delay to help user try again
    setTimeout(() => {
        input.removeAttribute('data-blocked-until');
        if (type === 'booked') {
            // For booked dates, suggest next available date
            const roomId = input.getAttribute('data-room-id');
            suggestNextAvailableDate(input, roomId);
            input.focus();
        }
    }, 1500);
}

// Show availability warning tanpa blocking
function showAvailabilityWarning(input, message) {
    input.classList.remove('fully-blocked');
    input.classList.add('has-blocked-dates');
    showDateMessage(input, message + ' - Ketersediaan terbatas', 'warning');
    updateTooltip(input, message);
}

// Clear date styling
function clearDateStyling(input) {
    input.classList.remove('fully-blocked', 'has-blocked-dates');
    input.style.borderColor = '';
    input.style.backgroundColor = '';
}

// Show message below date input
function showDateMessage(input, message, type) {
    clearDateMessages(input);
    
    const messageElement = document.createElement('small');
    messageElement.className = `date-warning text-${type}`;
    messageElement.textContent = message;
    
    // Insert after input or its wrapper
    const wrapper = input.closest('.date-tooltip') || input;
    wrapper.parentNode.insertBefore(messageElement, wrapper.nextSibling);
}

// Clear all date messages
function clearDateMessages(input) {
    const wrapper = input.closest('.date-tooltip') || input;
    let nextElement = wrapper.nextSibling;
    
    while (nextElement && nextElement.classList && nextElement.classList.contains('date-warning')) {
        const toRemove = nextElement;
        nextElement = nextElement.nextSibling;
        toRemove.remove();
    }
}

// Check date range for overlapping bookings dengan visual blocking
function validateDateRange(checkInInput, checkOutInput, roomId) {
    const checkInDate = checkInInput.value;
    const checkOutDate = checkOutInput.value;
    
    if (!checkInDate || !checkOutDate) return true;
    
    const disabledDates = JSON.parse(checkInInput.getAttribute('data-disabled-dates') || '[]');
    const roomSpecificDates = JSON.parse(checkInInput.getAttribute('data-room-specific-dates') || '{}');
    
    // Generate all dates in the range (excluding check-out date)
    const startDate = new Date(checkInDate);
    const endDate = new Date(checkOutDate);
    const dateRange = [];
    
    const currentDate = new Date(startDate);
    while (currentDate < endDate) { // Use < instead of <= to exclude check-out date
        dateRange.push(currentDate.toISOString().split('T')[0]);
        currentDate.setDate(currentDate.getDate() + 1);
    }
    
    // Check for conflicts in the range
    for (const date of dateRange) {
        if (roomId && roomSpecificDates[date] && roomSpecificDates[date].includes(parseInt(roomId))) {
            const conflictDate = new Date(date).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            blockDateSelection(checkOutInput, `Kamar sudah dibooking pada ${conflictDate}`, 'booked');
            return false;
        }
    }
    
    // Range is valid
    clearDateStyling(checkInInput);
    clearDateStyling(checkOutInput);
    clearDateMessages(checkInInput);
    clearDateMessages(checkOutInput);
    return true;
}

// Function to suggest next available date
function suggestNextAvailableDate(input, roomId) {
    const disabledDates = JSON.parse(input.getAttribute('data-disabled-dates') || '[]');
    const roomSpecificDates = JSON.parse(input.getAttribute('data-room-specific-dates') || '{}');
    const today = new Date();
    
    // Start from tomorrow
    let checkDate = new Date(today);
    checkDate.setDate(checkDate.getDate() + 1);
    
    // Look for next available date (max 30 days ahead)
    for (let i = 0; i < 30; i++) {
        const dateStr = checkDate.toISOString().split('T')[0];
        
        let isAvailable = true;
        if (roomId && roomSpecificDates[dateStr]) {
            isAvailable = !roomSpecificDates[dateStr].includes(parseInt(roomId));
        }
        
        if (isAvailable) {
            const formattedDate = checkDate.toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            
            showDateMessage(input, `Saran: ${formattedDate} tersedia`, 'info');
            break;
        }
        
        checkDate.setDate(checkDate.getDate() + 1);
    }
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
