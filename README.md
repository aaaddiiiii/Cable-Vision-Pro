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
![image](https://github.com/user-attachments/assets/7156d9d6-b8d4-4a3b-85ac-1824660d3e39)
![image](https://github.com/user-attachments/assets/b468ae57-d531-438f-bd14-a01b618699de)
![image](https://github.com/user-attachments/assets/10fff3c3-aedd-4391-ae43-68a989181679)
![image](https://github.com/user-attachments/assets/3b753ac3-5ef9-4bf5-99e3-02d859a0ddc9)
![image](https://github.com/user-attachments/assets/f8c8d921-9f4a-48b1-ad2f-fcce1daea20f)
![image](https://github.com/user-attachments/assets/b16e8e19-a2f9-4c9a-97c5-4d1ef05684df)
![image](https://github.com/user-attachments/assets/95cad341-6d80-4a2d-a42e-f769f4bed8ed)
![image](https://github.com/user-attachments/assets/59e63672-fd82-4797-a244-0375f0c24d20)
![image](https://github.com/user-attachments/assets/715b6a96-5822-43c9-99ef-0221fae8f736)
![image](https://github.com/user-attachments/assets/f204d3c0-7f77-499d-8e61-d07f9fb1ac93)
![image](https://github.com/user-attachments/assets/f0a25a39-feb1-4353-a7c0-d7fe2d1a932a)
![image](https://github.com/user-attachments/assets/722c2342-4e45-47b2-a3fb-a8d043726998)
![Screenshot 2024-11-03 101038](https://github.com/user-attachments/assets/4bf57591-c804-4a29-99ec-4b62d78855bb)
![Screenshot 2024-11-03 101129](https://github.com/user-attachments/assets/f3795225-7216-48dd-a5b9-4c4bb9c4926a)

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
