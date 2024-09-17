# Smart TRAIS Tool 

## Overview

**Title**: Smart TRAIS Tool: TRaceable Agro – Input Subsidy Tool Using Digital ID

**Sector**: Agriculture  

**Hosted Agro-dealer Portal**: https://trais-agro-dealer-web.vercel.app/

**Figma Design for Farmer registration on Mobile Devices**: https://www.figma.com/proto/p9NTbNvsI1kAqgHxhiHSek/Smart-Traceable-Agriculture?node-id=1-2&t=D9mYhTAMvB7sT1M0-1


## Problem Statement

Input subsidy programs (ISPs) in Sub-Saharan Africa face several critical challenges:

- **Traceability Problem**: There are disconnects between Agro-dealers, agricultural institutions, and farmers.
- **Fraud and Elite Capture**: Inefficiencies and misuse of resources undermine program effectiveness.
- **Lack of Specificity**: Blanket approaches fail to address individual needs effectively.

## Proposed Solution

The **Smart TRAIS Tool** leverages **Digital ID** to enhance the distribution of agricultural subsidies:

### Digital ID Integration

- **Verification and Traceability**: Links subsidies to Digital IDs, ensuring secure and traceable distribution.
- **API Integration**: Public and private entities fetch Digital IDs to determine subsidy eligibility and class.

## System Architecture
<img src="/public/TRAISFlow.jpg" alt="System Architecture" width="600" height="300"/>

## Class Diagram
<img src="/public/classDiagram.jpg" alt="Class Diagram" width="600" height="300"/>

## Use Case Diagram
<img src="/public/useCase.jpg" alt="Use Case Diagram" width="600" height="300"/>


## Key Users

1. Agro-Dealer

2. Admin (Government Entity)

3. Farmer

## How to Run the Agro-Dealer Portal

TRAIS Agro-Dealer Portal is a web application built using React. 

1. **Clone the Repository**
```bash
   git clone https://github.com/afsanat/TraisAgroDealerWeb.git
```

2. **Navigate to the Agro-Dealer Project Directory**
```bash
   cd TraisAgroDealerWeb
   ```

3. **Install Dependencies**
```bash
   npm install
   ```

4. **Start the Server**
```bash
   npm run dev
   ```
5. **To login, you can enter the following credentials**
- **Username**: `agrodealer`
- **Password**: `Test@123`

## How to Run the Admin Portal

TRAIS Admin Portal is a web application built using PHP and MySQL. This guide will walk you through the steps required to set up and run the application on your local server using XAMPP or WAMP.

**Prerequisites**

To run the application, ensure you have the following installed:

- **XAMPP** or **WAMP** (for running a local server with PHP and MySQL)

**Installation Guide**

**Step 1: Install XAMPP or WAMP**
1. Download and install [XAMPP](https://www.apachefriends.org/index.html) or [WAMP](https://www.wampserver.com/en/).
2. After installation, launch XAMPP/WAMP and start both **Apache** and **MySQL** services.

**Step 2: Set Up the Web Application**
1. Copy the entire `traisAdmin` project folder (it is already in the root folder cloned) and paste it into the **htdocs** directory (for XAMPP) or the **www** directory (for WAMP). 
   - For XAMPP, the path is usually `C:\xampp\htdocs\`.
   - For WAMP, the path is usually `C:\wamp64\www\`.

**Step 3: Set Up the Database**
1. Open your browser and navigate to **PHPMyAdmin** by typing `http://localhost/phpmyadmin/` in the address bar.
2. In PHPMyAdmin, create a new database:
   - Click on the **Databases** tab.
   - Enter a name for your database (i.e., `tms`).
   - Click **Create** to create the tms database.
3. Import the TRAIS database:
   - Click on the new database you've just created (tms).
   - Select the **Import** tab.
   - Click **Choose File** and locate the `tms.sql` file found inside the `traisAdmin` folder of the project.
   - Click **Go** to import the database.

**Step 4: Start the Application and Admin Login**
1. Open the browser and type the following URL:  
   `http://localhost/traisAdmin/index.php`
2. Locate Admin Login (top left corner, close to home icon)
3. Click Admin Login
4. enter below login details:
- **Username**: `admin`
- **Password**: `Test@123`
5. Go to eSignet & Subsidy
6. choose manage
7. enter the farmer's UIN (i.e: 6580954839)
8. Click search
9. Click Authenticate to be redirected to esignate portal to authenticate

**Additional Notes**
- Ensure that your XAMPP/WAMP Apache and MySQL services are running before trying to load the application.
- If you encounter any issues, check the configuration files such as `config.php` to ensure database connection details are correct.

## How to Run the API

TRAIS API is the application's backend built using Python fast API. deployed API link: https://traisapi.onrender.com/

1. **Navigate to the API Directory**
```bash
   cd traisApi
   ```
2. **Run the requirement.txt found in the "TraisAgroDealerWeb/traisApi" folder**
```bash
pip install -r requirements.txt
```
3. **Run the backend**
```bash
uvicorn main:app --reload --host 0.0.0.0 --port 8080
```

## Contact
For support or inquiries, please reach out to the project maintainer.
Nasiru, Thomson & Afsanat

---

