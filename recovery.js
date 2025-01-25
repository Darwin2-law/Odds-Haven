// Select dropdown content links and the button
const dropdownLinks = document.querySelectorAll('.dropdown-content a');
const dropdownButton = document.querySelector('.dropdown-btn');
const dropdownContent = document.querySelector('.dropdown-content');

// Handle dropdown open and close on hover and click
dropdownButton.addEventListener('click', function(event) {
  event.stopPropagation(); // Prevent closing on click
  dropdownContent.classList.toggle('show'); // Toggle dropdown visibility
});

// Redirect to WhatsApp on link click
dropdownLinks.forEach((link) => {
  link.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent default anchor behavior

    // Get price and type from data attributes
    const price = link.getAttribute('data-price');
    const type = link.getAttribute('data-type');

    // Construct WhatsApp URL
    const whatsappNumber = '+254745584815'; // Replace with your WhatsApp number
    const message = `Hello, I would like to place a ${type} recovery bet for $${price}.`;
    const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;

    // Redirect to WhatsApp
    window.location.href = whatsappURL;
  });
});

// Close dropdown when clicking outside of the dropdown, with a delay
let clickOutsideTimeout;
window.addEventListener('click', function(event) {
  if (!event.target.closest('.recovery-dropdown')) {
    clearTimeout(clickOutsideTimeout);
    clickOutsideTimeout = setTimeout(() => {
      dropdownContent.classList.remove('show');
    }, 300); // Set delay in milliseconds (300ms)
  }
});
