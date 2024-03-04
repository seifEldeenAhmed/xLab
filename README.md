# Employee Management System

This is a simple Employee Management System built with Laravel. It allows you to manage employees and their associated jobs.

## Setup Instructions

1. **Clone the repository**:

```bash
git clone https://github.com/seifEldeenAhmed/xLab.git
```

2. **Install Dependencies**:
Navigate into the project directory and install Composer dependencies:
```bash
cd xLab
composer install
```
3. **Set Up Environment Variables**:
Duplicate the .env.example file and rename it to .env. Update the database connection details in this file to match your local environment
```bash
cp .env.example .env
```
Generate a new application key:
```bash
php artisan key:generate
```
4. **Create database Tables**
Run database migrations to create the required tables:
```bash
php artisan migrate
```

5. **Seed Database (Optional):**
If you want to populate the database with sample data, run the database seeders:
```bash
php artisan db:seed
```
6. **Start the Development Server:**
Run the following command to start the Laravel development server:
```bash
php artisan serve
```
7. **Access the Application:**
Open your web browser and navigate to http://localhost:8000 to access the application.

## API ENDPOINT
You can retrieve a list of employees with the same job using the following API endpoint:

```bash
GET /api/employees/{job}
```
Replace {job} with the job title. Make sure to encode spaces in the job title seperated by hyphens like tour-guide

## Built Using
- Laravel - The PHP framework used
- Bootstrap - Front-end framework
