# PHP Simple CRUD

This project is a simple PHP CRUD application that stores data in a `JSON` file and supports running in Docker.

## 🚀 Features
- Create, Read, Update, and Delete (CRUD) users
- Store data in `users.json`
- Upload and save user images
- Data validation before saving
- Works with Docker using Apache and PHP 8.2

## 📂 Directory structure:
└── martinakopyan-phpsimplecrud/  
    ├── README.md  
    ├── Dockerfile  
    ├── _form.php  
    ├── create.php  
    ├── delete.php  
    ├── docker-compose.yml  
    ├── index.php  
    ├── update.php  
    ├── view.php  
    ├── partials/  
    │   ├── footer.php  
    │   ├── header.php  
    │   └── not_found.php  
    └── users/  
        ├── users.json  
        └── users.php  

## 🔹 Running with Docker  
1. Make sure Docker and Docker Compose are installed.  
2. Build and run the container:  
   ```sh
   docker-compose up --build -d  
3.Open in your browser:  
👉 http://localhost:8080  
