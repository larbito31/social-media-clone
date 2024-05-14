# Project Setup Instructions

Ensure you have the following prerequisites installed on your system:
- **PHP**
- **Composer**
- **npm**

## Setup Steps

### 1. Navigate to API Directory
Ensure you are in the API directory:

```
cd api
```
### 2. Install Dependencies
Install all necessary dependencies for the project:

```
composer install
```
```
npm install
```
### 3. Set Up Environment
Copy the example environment file and generate an application key:
```
cp .env.example .env
```
```
php artisan key:generate
```
### 4. Database Configuration
- **Create your database** if it is not already created.
- **Configure your database** in the `.env` file.
- **Run migrations** to set up the database schema:

```
php artisan migrate
```
### 5. Generate JWT Secret
Generate a new JWT secret key for authentication:
```
php artisan jwt:secret
```
### 6. Start the Project
Start the local development server:
```
php artisan serve
```


