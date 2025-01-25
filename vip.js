// Get dropdown button and content
const dropdownBtn = document.querySelector('.dropdown-btn');
const dropdownContent = document.querySelector('.dropdown-content');
const vipDropdown = document.querySelector('.vip-dropdown');

// Toggle dropdown visibility on button click
dropdownBtn.addEventListener('click', (e) => {
  e.stopPropagation();  // Prevent event from propagating to document
  vipDropdown.classList.toggle('show'); // Toggle visibility
});

// Close the dropdown if the user clicks outside
document.addEventListener('click', (e) => {
  if (!vipDropdown.contains(e.target)) {
    vipDropdown.classList.remove('show');
  }
});

// Handle dropdown option click
const dropdownLinks = document.querySelectorAll('.dropdown-content a');
dropdownLinks.forEach((link) => {
  link.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent default anchor behavior

    // Get price and type from data attributes
    const price = link.getAttribute('data-price');
    const type = link.getAttribute('data-type');

    // Construct WhatsApp URL
    const whatsappNumber = '+254745584815'; // Replace with your WhatsApp number
    const message = `Hello, I would like to purchase the ${type} package for $${price}.`;
    const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;

    // Redirect to WhatsApp
    window.location.href = whatsappURL;

    // Optionally, hide the dropdown after selection
    vipDropdown.classList.remove('show');
  });
});
