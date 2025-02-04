# PHP Simple CRUD

This project is a simple PHP CRUD application that stores data in a `JSON` file and supports running in Docker.

## 🚀 Features
- Create, Read, Update, and Delete (CRUD) users
- Store data in `users.json`
- Upload and save user images
- Data validation before saving
- Works with Docker using Apache and PHP 8.2

## 📂 Project Structure
martinakopyan-phpsimplecrud/ ├── Dockerfile # Docker build file ├── docker-compose.yml # Docker Compose configuration ├── index.php # Main page displaying the list of users ├── create.php # Form to create a new user ├── update.php # Form to edit an existing user ├── delete.php # Deletes a user ├── view.php # View user details ├── _form.php # Shared form for creating/updating users ├── users/ │ ├── users.json # User database (JSON) │ ├── users.php # Functions for handling users │ ├── images/ # Directory for uploaded images ├── partials/ │ ├── header.php # Page header │ ├── footer.php # Page footer │ ├── not_found.php # 404 error if the user is not found └── README.md # This file

## 🔹 Running with Docker  
1. Make sure Docker and Docker Compose are installed.  
2. Build and run the container:  
   ```sh
   docker-compose up --build -d  
3. Open in your browser:  
  👉 http://localhost:8080
