// Admin login and session management
document.addEventListener("DOMContentLoaded", function () {
  // Check if admin is logged in
  const adminPanel = document.getElementById("admin-panel");
  const loginContainer = document.getElementById("login-container");
  const logoutButton = document.getElementById("logout-button");

  // Simulate admin login session using localStorage
  if (localStorage.getItem("adminLoggedIn") === "true") {
      loginContainer.style.display = "none";
      adminPanel.style.display = "block";
  } else {
      loginContainer.style.display = "block";
      adminPanel.style.display = "none";
  }

  // Handle logout
  logoutButton.addEventListener("click", function () {
      // Clear the admin login session
      localStorage.removeItem("adminLoggedIn");
      // Redirect to the login page
      window.location.reload();
  });

  // Post message to notifications (submit the form)
  const postMessageForm = document.getElementById("post-message-form");

  if (postMessageForm) {
      postMessageForm.addEventListener("submit", function (e) {
          e.preventDefault(); // Prevent form submission

          const message = document.getElementById("message").value;

          // Example of posting the message via fetch (could also use AJAX)
          fetch("post_message.php", {
              method: "POST",
              body: JSON.stringify({ message: message }),
              headers: {
                  "Content-Type": "application/json",
              },
          })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      alert("Message posted successfully!");
                      // Refresh the notifications
                      loadNotifications();
                  } else {
                      alert("Failed to post message!");
                  }
              })
              .catch(error => {
                  console.error("Error posting message:", error);
              });
      });
  }

  // Fetch notifications from the database
  function loadNotifications() {
      fetch("get_notifications.php")
          .then(response => response.json())
          .then(data => {
              const notificationsTableBody = document.querySelector("#notifications-table tbody");
              notificationsTableBody.innerHTML = "";

              data.notifications.forEach(notification => {
                  const row = document.createElement("tr");
                  row.innerHTML = `
                      <td>${notification.message}</td>
                      <td><a href="javascript:void(0);" onclick="deleteNotification(${notification.id})">Delete</a></td>
                  `;
                  notificationsTableBody.appendChild(row);
              });
          })
          .catch(error => {
              console.error("Error loading notifications:", error);
          });
  }

  // Delete a notification
  window.deleteNotification = function (notificationId) {
      if (confirm("Are you sure you want to delete this notification?")) {
          fetch("delete_notification.php", {
              method: "POST",
              body: JSON.stringify({ id: notificationId }),
              headers: {
                  "Content-Type": "application/json",
              },
          })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      alert("Notification deleted!");
                      // Refresh the notifications
                      loadNotifications();
                  } else {
                      alert("Failed to delete notification!");
                  }
              })
              .catch(error => {
                  console.error("Error deleting notification:", error);
              });
      }
  };

  // Fetch registered users (for displaying in the table)
  function loadUsers() {
      fetch("get_users.php")
          .then(response => response.json())
          .then(data => {
              const usersTableBody = document.querySelector("#users-table tbody");
              usersTableBody.innerHTML = "";

              data.users.forEach(user => {
                  const row = document.createElement("tr");
                  row.innerHTML = `
                      <td>${user.first_name}</td>
                      <td>${user.last_name}</td>
                      <td>${user.email}</td>
                  `;
                  usersTableBody.appendChild(row);
              });
          })
          .catch(error => {
              console.error("Error loading users:", error);
          });
  }

  // Load notifications and users on page load
  if (localStorage.getItem("adminLoggedIn") === "true") {
      loadNotifications();
      loadUsers();
  }
});
