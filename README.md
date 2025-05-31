# Laravel Patient Test Project

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)

This is a test project built with Laravel to demonstrate patient management functionality. It includes features for managing patient records with a clean, responsive interface.

## Features

- **Patient Management**
  - Add, view, and manage patient records
  - Search and filter patients
  - Paginated patient listing

- **User Authentication**
  - Secure login/logout
  - Role-based access control (Admin/Staff)
  - Password reset functionality

- **Responsive Design**
  - Mobile-friendly interface
  - Clean and intuitive UI

## Requirements

- Docker and Docker Compose
- Git

## Installation

You can install the application using your preferred method or using the provided Docker setup.

### Using Docker

1. Clone the repository:

   ```bash
   git clone git@github.com:w33ladalah/laravel-patients-test.git
   cd laravel-patients-test
   ```

2. Pull the Laradock submodule:

   ```bash
   git submodule update --init --recursive
   ```

3. Start the Docker containers (from the project root):

   ```bash
   cd docker
   docker compose up -d nginx mysql adminer
   ```

   > **Note:** Refer to the [Laradock documentation](https://laradock.io/) for more details on configuration.

4. Enter the workspace container:

   ```bash
   docker compose exec workspace bash
   ```

5. Install PHP and Node.js dependencies:

   ```bash
   composer install && npm install
   ```

6. Generate application key:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

7. Run database migrations and seed the database:

   ```bash
   php artisan migrate:fresh --seed
   ```

8. Access the application at `http://localhost`

## Default Admin Account

- **Email**: admin@example.com
- **Password**: password
