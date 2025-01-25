// Get elements
const notificationDisplay = document.getElementById('notification-display');
const chatIcon = document.getElementById('chat-icon');

// Mock notifications storage (loaded from localStorage)
let notifications = JSON.parse(localStorage.getItem('notifications')) || [];

// Function to display notifications
function displayNotifications() {
  if (notificationDisplay) {
    notificationDisplay.innerHTML = notifications
      .map(
        (notification) => `
      <li>
        <strong>${notification.title}</strong>: ${notification.message}
      </li>
    `
      )
      .join('');
  }
}

// Redirect Chat Icon to WhatsApp Group
if (chatIcon) {
  chatIcon.addEventListener('click', () => {
    window.location.href = 'https://chat.whatsapp.com/YOUR_GROUP_LINK'; // Replace with your WhatsApp group link
  });
}

// Load notifications when the page loads
displayNotifications();
// Example: Handle sidebar clicks (you can extend functionality if needed)
document.getElementById('profile').addEventListener('click', function() {
    alert('Navigating to Profile Page');
  });
  
  document.getElementById('payment').addEventListener('click', function() {
    alert('Navigating to Payment Page');
  });
  
  document.getElementById('help').addEventListener('click', function() {
    alert('Navigating to Help Section');
  });
  
  document.getElementById('facebook').addEventListener('click', function() {
    window.open('https://facebook.com', '_blank');
  });
  
  document.getElementById('twitter').addEventListener('click', function() {
    window.open('https://twitter.com', '_blank');
  });
  