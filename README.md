# MobileKart - E-Commerce Mobile Shopping Website

## Overview

MobileKart is an e-commerce platform designed to offer customers a seamless and secure online shopping experience for the latest mobile devices. I led the development of this platform, focusing on creating a user-friendly interface, integrating backend functionality, and ensuring a smooth shopping experience.

The website provides the following core features:
- **User Registration & Authentication**: Users can create accounts and log in to access their personalized experience.
- **Product Catalog**: A detailed catalog showcasing a wide range of mobile devices, with images, descriptions, and prices.
- **Order Processing**: Users can add products to their cart and place orders seamlessly.
- **Customer Support**: Integrated support system to address user inquiries and issues.

## Features

- **User Registration & Login**: Allows customers to create accounts and log in securely.
- **Product Catalog**: Browse the latest mobile phones with detailed specifications.
- **Search Functionality**: Search for specific mobile devices based on brand, price, or features.
- **Add to Cart & Checkout**: Add items to the cart, review order details, and securely checkout.
- **Order Tracking**: Track your orders for status updates and delivery information.
- **Admin Panel**: Admins can manage product listings, user data, and orders.

## Technologies Used

- **Frontend:**
  - HTML5
  - CSS3
  - JavaScript
  - Bootstrap
  
- **Backend:**
  - PHP
  - MySQL for database management
  
- **Tools & Libraries:**
  - Bootstrap for responsive UI
  - jQuery for frontend interactivity
  - PHP for server-side logic and form validation

## Installation

To set up the project on your local machine, follow the instructions below:

### Prerequisites

Ensure that you have the following installed:
- A web server such as **XAMPP**, **WAMP**, or **MAMP** to run PHP.
- **MySQL** for database management.

        MobileKart/
            ├── config.php                   # Configuration file for database connection
            ├── check.php                    # File for checking user login status or session validation
            ├── db.php                       # Database connection logic
            ├── For_Database_Entry_(Admin).php # Admin page for database management and entry
            ├── store.php                    # Logic for handling the shopping cart and orders
            ├── css/                         # Directory for CSS styles
            │   └── style.css                # Main CSS file
            ├── img/                         # Directory for images (product images, logo, etc.)
            │   └── logo.png                 # Example image file
            ├── src/                         # Directory for JavaScript files
            │   └── script.js                # JavaScript for handling frontend interactions
            ├── 24x7.php                      # Customer support or live chat functionality
            ├── Account.php                  # Account management page for users (edit details, view orders)
            ├── activate.php                 # User account activation (email verification)
            ├── Brand.php                    # Page displaying different mobile brands
            ├── Checkout.php                 # Page for order checkout process
            ├── Done.php                     # Confirmation page after successful order
            ├── index.php                    # Main homepage of the website
            ├── Login.php                    # User login page
            ├── Logout.php                   # User logout functionality
            ├── Orders.php                   # Order management for the user
            ├── Page 2.php                   # Additional page (could be for displaying more products or categories)
            ├── Privacy Policy.php           # Page for privacy policy
            ├── Products.php                 # Page for displaying product listings
            ├── README.md                    # Project documentation
            ├── Signup.php                   # User registration page
            └── Terms of Use.php             # Page for terms of use


### Steps to Set Up

1. **Clone the repository**:

   ```bash
   git clone https://github.com/Kuldeep7k/Mobilekart
   ```

2. Move the project to the web server directory:

    For XAMPP: C:/xampp/htdocs/
    For WAMP: C:/wamp/www/
    Set up the database:

3. Open phpMyAdmin and create a new database named mobilekart.

4. Open the config.php file located in the root directory of the project.

    Update the MySQL connection details (host, username, password, database_name).

5. Run the Website:

    Start the Apache and MySQL servers in your web server (XAMPP/WAMP).
    Open your browser and go to http://localhost/mobilekart.


## Contributions
This project was developed as part of my final year project.
Feel free to fork the repository and contribute to its development.

## License
This project is open-source and available under the MIT License.