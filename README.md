This system has the following tech stack:

- React as frontend (web)
- React Native as frontend (mobile)
- Laravel as backend

React and React Native interface with Laravel through APIs. The endpoints are to be specified.

# Setup

## Client

The client portion is handled with [Vite](https://vitejs.dev/guide/), but it is likely not going to be relevant unless something goes terribly wrong.

- Run `npm i`
- Copy the `.env.example` file to `.env` and fill in the required entries
- Run `npm run dev` to develop

## Server

- Copy and edit the `.env.example` file to `.env`
- Check and update dependencies by running `composer update`
- Make sure to have a mysql connection. If you are using a virtualhost, run a mysql server
- `php artisan migrate`
- `php artisan serve`
- The database name is **"comelec_database"**

## Mobile

The mobile portion of this application is handled with [Expo](https://docs.expo.dev/).

- Download the [Expo](https://play.google.com/store/apps/details?id=host.exp.exponent) app on your phone
- Run `npm i`
- Run `npm run start` or `npm run android` to develop
  - Note: You may want to connect your android device first. Try with the QR Code, IP address, or directly connecting through USB and doing `npm run android`.

### In case Expo Go doesn't connect

Try connecting through tunnel instead of LAN. **Note: It may be slower to connect, so it is not recommended to use**. [See this StackOverflow question](https://stackoverflow.com/questions/66766591/expo-error-starting-tunnel-failed-to-install-expo-ngrok2-4-3-globally)

- `npm i @expo/ngrok`
- **Install ngrok for your system. Good luck.**
- `ngrok http 3000` (Run this is another terminal window)
- `npx expo start --tunnel`

# Notes

- [React Router](https://reactrouter.com/en/main/start/tutorial)
  - Gives this the SPA functionality
  - Lots of features. Nice to play around with. Give it a try
  - **It is recommended to use the new [data router](https://reactrouter.com/en/main/routers/create-browser-router), so this is what has been used for the project**
    - [A good example of implementation](https://github.com/remix-run/react-router/blob/dev/examples/data-router/src/app.tsx)

- [React Native Paper](https://callstack.github.io/react-native-paper/)
  - Component and theming library for mobile

## Misc. Notes

- https://www.twilio.com/blog/build-restful-api-php-laravel-sanctum
- https://github.com/koole/react-sanctum
- Auth CORS errors: https://stackoverflow.com/questions/61421547/getting-401-unauthorized-for-laravel-sanctum
- Preventing 401 error on user after login: https://laracasts.com/discuss/channels/vue/authenticating-a-spa-using-laravel-but-getting-401-unauthenticated-user
