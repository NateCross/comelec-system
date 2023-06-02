Test system designed for the following setup:

- React as frontend (web)
- React Native as frontend (mobile)
- Laravel as backend

React and React Native interface with Laravel through APIs. The endpoints are to be specified.

The React was bootstrapped with Vite.js.

# Setup

## Client

- Run `npm i`
- Copy the `.env.example` file to `.env` and fill in the required entries
- Run `npm run dev` to develop

## Server

- Copy and edit the `.env.example` file to `.env`
- Check and update dependencies by running `composer update`
- Make sure to have a mysql connection. If you are using a virtualhost, run a mysql server
- `php artisan migrate`
- `php artisan serve`
- the database name is "comelec_database"

# Notes

- React Router: https://reactrouter.com/en/main/start/tutorial
  - Gives this the SPA functionality
  - Lots of features. Nice to play around with. Give it a try

- https://www.twilio.com/blog/build-restful-api-php-laravel-sanctum
- https://github.com/koole/react-sanctum
- Auth CORS errors: https://stackoverflow.com/questions/61421547/getting-401-unauthorized-for-laravel-sanctum
- Preventing 401 error on user after login: https://laracasts.com/discuss/channels/vue/authenticating-a-spa-using-laravel-but-getting-401-unauthenticated-user
