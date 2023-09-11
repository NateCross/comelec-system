# E-Voting System

This system has the following tech stack:

- Laravel as frontend (web)
- React Native as frontend (mobile)
- Laravel as backend

React and React Native interface with Laravel through APIs. The endpoints are to be specified.

## Setup

**Important: Client and Server have the best chance of working if they have the same domain.**

**If the server is hosted, i.e. `php artisan serve --host 0.0.0.0`, then the client must be served with the same IP address as well.**

**As such, the entries `SESSION_DOMAIN` and `SANCTUM_STATEFUL_DOMAINS` in `server/.env` must point to the IP address or domain name of the client.**

### Server

- Copy and edit the `.env.example` file to `.env`
- Check and update dependencies by running `composer update`
- `composer install`
- `php artisan key:generate`
- Make sure to have a mysql connection. If you are using a virtualhost, run a mysql server
- `php artisan migrate`
- `npm run dev` or `npm run build`
- `php artisan serve`
- The database name is **"comelec\_database"**

#### Serving over LAN

`php artisan serve --host 0.0.0.0`

On Linux, other ports may not be able to be forwarded, so try this instead

`sudo php artisan serve --host 0.0.0.0 --port=80`

### Mobile

The mobile portion of this application is handled with [Expo](https://docs.expo.dev/).

Source files are located in the `app/` folder. [Expo Router](https://expo.github.io/router/docs/features/routing) is a file-based routing system, so its structure must be followed.

- Download the [Expo](https://play.google.com/store/apps/details?id=host.exp.exponent) app on your phone
- Run `npm i -D`
  - Dev dependencies needed for accessing `.env`
- Copy and edit the `.env.example` file to `.env`
- Run `npm run start` or `npm run android` to develop
  - Note: You may want to connect your android device first. Try with the QR Code, IP address, or directly connecting through USB and doing `npm run android`.

#### Build for Mobile

- `cd` to `mobile/`
- `eas build --profile preview --platform android`

##### In case build doesn't work

- Remove `package-lock.json`

#### In case Expo Go doesn't connect

Try connecting through tunnel instead of LAN. **Note: It may be slower to connect, so it is not recommended to use**. [See this StackOverflow question](https://stackoverflow.com/questions/66766591/expo-error-starting-tunnel-failed-to-install-expo-ngrok2-4-3-globally)

- `npm i @expo/ngrok`
- **Install ngrok for your system. Good luck.**
- `ngrok http 3000` (Run this in another terminal window)
- `npx expo start --tunnel`
