## Installation

Clone the repository

    git clone git@github.com:psantini13/MaxHomeInspections.git

Switch to the repo folder

    cd MaxHomeInspections

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate 

Seed the database

    php artisan db:seed 

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Get Loan Application Information

To get Loan Application Information try http://localhost:8000/api/applications/1

### Note

This seeder fill only one application
