# Cable-Vision-Pro

Cable-Vision-Pro is a web-based cable connection management application developed using PHP, MySQL, HTML, CSS, and JavaScript. This system allows users to manage cable connections efficiently while providing an admin interface for overseeing customer accounts, billing, and complaints. Built with XAMPP as the local server environment, this system is suitable for small to medium-sized cable service providers.

# Features

1. User Registration and Role Selection: New Admins and Users can be added by the admin.
2. Admin Panel: Admins can manage customer accounts, view and edit billing details, and handle complaints.
3. Customer Management: Track customer subscriptions, manage details like addresses and contact information.
4. Billing System: Generate bills for all customers at once, with real-time updates on payment status.
5. Complaints Management: Admins can manage and resolve customer complaints efficiently.
6. Database Integration: MySQL is used for reliable data management across the system.


# Sample Images
![Screenshot 2024-11-03 095500](https://github.com/user-attachments/assets/1412b9a0-84cc-423e-8829-3ba83666d0d1)








# Technologies Used

* Backend: PHP for server-side scripting and MySQL for database management.
* Frontend: HTML, CSS, and JavaScript for user interface and interactivity.
* Server Setup: XAMPP to host and run the application locally.

# Installation

To run this project locally, follow these steps:

* Clone the Repository:

git clone https://github.com/yourusername/Cable-Vision-Pro.git
cd Cable-Vision-Pro

* Set Up XAMPP:

Download and install XAMPP.
Move the project files to the htdocs folder in the XAMPP installation directory (usually located in C:/xampp/htdocs on Windows).
Database Configuration:

Start XAMPP and open phpMyAdmin (usually at http://localhost/phpmyadmin).
Create a new database (e.g., cableconnection).
Import the SQL file provided in the repository (e.g., database.sql) to set up the necessary tables and data structure.

# Project Structure

* index.php: Main landing page.
* ADMIN PAGES : Contains pages and scripts for admin management of customers, billing, and complaints.
* CUSTOMER PAGES : Interface for customers to view their details and manage their subscriptions.
* LOGIN PAGES : Contains the customer and admin login pages and customer and admin dashboard.

# Usage

* User Registration: Register as a customer or admin.
* Admin Login: Admin can log in to manage users and view billing details.
* Billing Management: Admin can view, update, and delete billing information as needed.
* Complaints Handling: Admin can manage and resolve customer complaints efficiently.

# License

This project is licensed under the GNU GPL 3.0. See the LICENSE file for details.
