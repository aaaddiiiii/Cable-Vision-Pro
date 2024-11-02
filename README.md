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


![Screenshot 2024-11-02 170600](https://github.com/user-attachments/assets/661649ac-0a6e-4511-9c3b-e00d2ede3346)
![Screenshot 2024-11-02 170624](https://github.com/user-attachments/assets/3462551d-2a94-4caf-8172-62b9b0870acc)
![Screenshot 2024-11-02 170434](https://github.com/user-attachments/assets/3d478a3e-4800-4af0-ab10-fca21764631b)
![Screenshot (173)](https://github.com/user-attachments/assets/03f11521-498e-4966-bfdd-e5f4f0844f97)
![Screenshot 2024-11-02 170451](https://github.com/user-attachments/assets/0012d680-c923-4bfe-9a84-be5b5cfa1242)
![Screenshot (174)](https://github.com/user-attachments/assets/506766c0-2fe5-450c-850f-7fc7a1106bf6)



# Technologies Used
1. Backend: PHP for server-side scripting and MySQL for database management.
2. Frontend: HTML, CSS, and JavaScript for user interface and interactivity.
3. Server Setup: XAMPP to host and run the application locally.

# Installation
To run this project locally, follow these steps:

Clone the Repository:

git clone https://github.com/yourusername/Cable-Vision-Pro.git
cd Cable-Vision-Pro

Set Up XAMPP:

Download and install XAMPP.
Move the project files to the htdocs folder in the XAMPP installation directory (usually located in C:/xampp/htdocs on Windows).
Database Configuration:

Start XAMPP and open phpMyAdmin (usually at http://localhost/phpmyadmin).
Create a new database (e.g., cableconnection).
Import the SQL file provided in the repository (e.g., database.sql) to set up the necessary tables and data structure.

# Project Structure
index.php: Main landing page.
ADMIN PAGES : Contains pages and scripts for admin management of customers, billing, and complaints.
CUSTOMER PAGES : Interface for customers to view their details and manage their subscriptions.
LOGIN PAGES : Contains the customer and admin login pages and customer and admin dashboard.

# Usage
1. User Registration: Register as a customer or admin.
2. Admin Login: Admin can log in to manage users and view billing details.
3. Billing Management: Admin can view, update, and delete billing information as needed.
4. Complaints Handling: Admin can manage and resolve customer complaints efficiently.

# License
This project is licensed under the GNU GPL 3.0. See the LICENSE file for details.
