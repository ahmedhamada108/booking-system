# Laravel Bus Booking System

This Laravel Bus Booking System is designed to manage bus trips, stations, and seat bookings. It provides a simple API for users to interact with the bus booking functionalities.

## Table of Contents

- [Installation](#installation)
- [Running the Project](#running-the-project)
- [Database Migration and Seeding](#database-migration-and-seeding)
- [Login Credentials](#login-credentials)
- [API Routes](#api-routes)
- [License](#license)

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/ahmedhamada108/booking-system
   ```

2. Navigate to the project directory:

   ```bash
   cd laravel-bus-booking
   ```

3. Install the dependencies using Composer:

   ```bash
   composer install
   ```

4. Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

5. Generate an application key:

   ```bash
   php artisan key:generate
   ```

## Running the Project

1. Start the local development server:

   ```bash
   php artisan serve
   ```

2. The application will be accessible at `http://localhost:8000`.

## Database Migration and Seeding

To set up your database, follow these steps:

1. Make sure you have configured your database settings in the `.env` file:

   ```plaintext
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

2. Run the migrations:

   ```bash
   php artisan migrate
   ```

3. (Optional) Seed the database with sample data:

   ```bash
   php artisan db:seed
   ```

## Login Credentials

To log into the application, use the following credentials:

- **Email**: admin1@admin.com
- **Password**: password

You can change these credentials in the database after running the migrations and seeding.

## API Routes

Here are the available API routes for the application:

- **Login**
  - `POST /login`
  - Controller: `AuthController@login`

- **Get All Stations**
  - `GET /bus/stations`
  - Controller: `StationController@index`

- **Get All Trips**
  - `GET /bus/trips`
  - Controller: `TripController@index`

- **Get Available Seats**
  - `GET /bus/seats`
  - Controller: `SeatController@index`

- **Book Seats**
  - `POST /bus/book-seats`
  - Controller: `BookingController@bookSeats`
  - Middleware: `auth.user`

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
