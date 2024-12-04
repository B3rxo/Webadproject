document.addEventListener('DOMContentLoaded', () => {
    // Menu Items
    const menuItems = [
        { name: 'Espresso', price: 3.50, description: 'Classic Italian coffee shot' },
        { name: 'Cappuccino', price: 4.50, description: 'Espresso with steamed milk foam' },
        { name: 'Latte', price: 4.75, description: 'Espresso with lots of steamed milk' },
        { name: 'Americano', price: 3.75, description: 'Espresso with hot water' },
        { name: 'Mocha', price: 5.00, description: 'Espresso with chocolate and milk' },
        { name: 'Cold Brew', price: 4.25, description: 'Smooth, cold-steeped coffee' }
    ];

    const menuGrid = document.getElementById('menuItems');
    menuItems.forEach(item => {
        const menuItemDiv = document.createElement('div');
        menuItemDiv.classList.add('menu-item');
        menuItemDiv.innerHTML = `
            <h3>${item.name}</h3>
            <p>${item.description}</p>
            <p class="price">$${item.price.toFixed(2)}</p>
        `;
        menuGrid.appendChild(menuItemDiv);
    });

    // Table Booking
    const bookingForm = document.getElementById('bookingForm');
    const bookingResult = document.getElementById('bookingResult');

    bookingForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const date = document.getElementById('date').value;
        const time = document.getElementById('time').value;
        const guests = document.getElementById('guests').value;

        // Simulated availability check
        const availableTables = Math.floor(Math.random() * 5) + 1;
        
        if (availableTables > 0) {
            bookingResult.innerHTML = `
                <p class="success">Great news! ${availableTables} table(s) available for ${guests} guests on ${date} at ${time}.</p>
                <button onclick="confirmBooking()">Confirm Booking</button>
            `;
        } else {
            bookingResult.innerHTML = `
                <p class="error">Sorry, no tables available for the selected time.</p>
            `;
        }
    });

    window.confirmBooking = function() {
        alert('Booking confirmed! We look forward to serving you.');
        bookingForm.reset();
        bookingResult.innerHTML = '';
    }
});