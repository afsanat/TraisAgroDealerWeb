Here’s a **README** file description for your system:

---

# TRAIS - Web Application Setup Guide

## Overview

TRAIS (Transport and Reservation Information System) is a web application built using PHP and MySQL. This guide will walk you through the steps required to set up and run the application on your local server using XAMPP or WAMP.

## Prerequisites

To run the application, ensure you have the following installed:

- **XAMPP** or **WAMP** (for running a local server with PHP and MySQL)

## Installation Guide

### Step 1: Install XAMPP or WAMP
1. Download and install [XAMPP](https://www.apachefriends.org/index.html) or [WAMP](https://www.wampserver.com/en/).
2. After installation, launch XAMPP/WAMP and start both **Apache** and **MySQL** services.

### Step 2: Set Up the Database
1. Open your browser and navigate to **PHPMyAdmin** by typing `http://localhost/phpmyadmin/` in the address bar.
2. In PHPMyAdmin, create a new database:
   - Click on the **Databases** tab.
   - Enter a name for your database (e.g., `trais_db`).
   - Click **Create**.
3. Import the TRAIS database:
   - Click on the new database you've just created.
   - Select the **Import** tab.
   - Click **Choose File** and locate the `tms.sql` file found inside the `trais` folder of the project.
   - Click **Go** to import the database.

### Step 3: Set Up the Web Application
1. Copy the entire `trais` project folder and paste it into the **htdocs** directory (for XAMPP) or the **www** directory (for WAMP). 
   - For XAMPP, the path is usually `C:\xampp\htdocs\`.
   - For WAMP, the path is usually `C:\wamp64\www\`.
2. After placing the project folder, open your browser and navigate to:  
   `http://localhost/trais/index.php`

### Step 4: Admin Login
To access the system as an admin:
- **Username**: `admin`
- **Password**: `Test@123`

### Additional Notes
- Ensure that your XAMPP/WAMP Apache and MySQL services are running before trying to load the application.
- If you encounter any issues, check the configuration files such as `config.php` to ensure database connection details are correct.

## Contact
For support or inquiries, please reach out to the project maintainer.
Nasiru, Thompson & Afsanah

---

Feel free to modify the details as needed for your specific system configuration.