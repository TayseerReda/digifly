# Task Management API (Laravel 10)

A RESTful API for managing tasks using Laravel 10, featuring authentication with Laravel Sanctum, CRUD operations, validation, and pagination.

---

## 🚀 Features

👉 Laravel 10 with Sanctum authentication  
👉 CRUD operations for managing tasks  
👉 Input validation  
👉 Soft deletion of tasks  
👉 Restore and permanently delete tasks  
👉 Pagination for task listing  
👉 API resource classes for structured responses  
👉 Filter tasks by status  

---

## 📌 Setup Instructions

### 1️⃣ Clone the Repository  
```sh
git clone https://github.com/TayseerReda/digifly.git
```

### 2️⃣ Install Dependencies  
```sh
composer install
```

### 3️⃣ Configure Environment  
Copy the `.env.example` file and update the database credentials:  
```sh
cp .env.example .env
```
Then, open `.env` and set your database configuration:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Generate App Key  
```sh
php artisan key:generate
```

### 5️⃣ Run Migrations & Seeders  
```sh
php artisan migrate --seed
```

### 6️⃣ Install and Configure Laravel Sanctum  
```sh
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

### 7️⃣ Start the Server  
```sh
php artisan serve
```
The API will be available at: [http://127.0.0.1:8000/api](http://127.0.0.1:8000/api)

---

## 🔑 Authentication (Laravel Sanctum)

Sanctum provides token-based authentication for securing API requests.

### 📌 Register  
**Endpoint:** `POST /api/register`  
**Request Body:**
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password",
  "password_confirmation": "password"
}
```
**Response:**
```json
{
  "token": "your-auth-token"
}
```

### 📌 Login  
**Endpoint:** `POST /api/login`  
**Request Body:**
```json
{
  "email": "john@example.com",
  "password": "password"
}
```
**Response:**
```json
{
  "token": "your-auth-token"
}
```

### 📌 Logout  
**Endpoint:** `POST /api/logout`  
Include the following header for authentication:  
```sh
Authorization: Bearer your-auth-token
```

---

## 📌 API Endpoints

**All API routes are protected by Sanctum middleware (`auth:sanctum`).**

### 1️⃣ Get All Tasks  
**Endpoint:** `GET /api/tasks`  
Supports filtering by status using `?status=pending`.

**Response Example:**
```json
{
  "data": [
    {
      "id": 1,
      "name": "Sample Task",
      "description": "This is a sample task.",
      "status": "pending",
      "created_at": "2025-02-14T12:00:00.000000Z",
      "updated_at": "2025-02-14T12:00:00.000000Z"
    }
  ]
}
```

### 2️⃣ Get a Single Task  
**Endpoint:** `GET /api/tasks/{id}`  

### 3️⃣ Create a Task  
**Endpoint:** `POST /api/tasks`  
**Request Body:**
```json
{
  "name": "New Task",
  "description": "This is a new task.",
  "status": "pending"
}
```

### 4️⃣ Update a Task  
**Endpoint:** `PUT /api/tasks/{id}`  
**Request Body:**
```json
{
  "name": "Updated Task",
  "status": "in_progress"
}
```

### 5️⃣ Delete a Task (Soft Delete)  
**Endpoint:** `DELETE /api/tasks/{id}`  
**Response:**
```json
{
  "message": "Task deleted successfully"
}
```

### 6️⃣ Restore a Deleted Task  
**Endpoint:** `POST /api/tasks/{id}/restore`  
**Response:**
```json
{
  "message": "Task restored successfully"
}
```

### 7️⃣ Permanently Delete a Task (Force Delete)  
**Endpoint:** `DELETE /api/tasks/{id}/force-delete`  
**Response:**
```json
{
  "message": "Task permanently deleted"
}
```





