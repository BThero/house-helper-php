
# House Helper App

A House Helper app, implemented with Laravel, for Modern Web Development course at Harbour.Space. The live version can be seen at https://php.bthero.online/

Users of the app will be able to create and join houses, and access a lot of house-related handy services.

Examples of such services might include:
- Bills (electricity, water, groceries, etc) management.
- To-do list for items that have to be bought, errands that have to be run, etc.
- A common chat for all house members to communicate.
- Calendar/Time management service for taking a shower or doing laundry.
- Managing clean dishes

## Setup

- First, create a new Docker instance by running `docker-compose up -d` in the project root. The project uses PostgreSQL, both locally and in production.
- Run 'composer install' and 'npm install' to install the required libraries.
- Copy `.env.example` to `.env`, **but** you will have to provide your own API key for services like WeatherAPI. 

## Run

- Run the project with `php artisan serve` and `npm run dev`.

## Authors

- Temirlan Baibolov [@bthero](https://www.github.com/bthero)

