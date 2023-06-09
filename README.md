# E-Voting System

This system has the following tech stack:

- React as frontend (web)
- React Native as frontend (mobile)
- Laravel as backend

React and React Native interface with Laravel through APIs. The endpoints are to be specified.

## Setup

**Important: Client and Server have the best chance of working if they have the same domain.**

**If the server is hosted, i.e. `php artisan serve --host 0.0.0.0`, then the client must be served with the same IP address as well.**

**As such, the entries `SESSION_DOMAIN` and `SANCTUM_STATEFUL_DOMAINS` in `server/.env` must point to the IP address or domain name of the client.**

### Client

The client portion is handled with [Vite](https://vitejs.dev/guide/), but it is likely not going to be relevant unless something goes terribly wrong.

- Run `npm i`
- Copy the `.env.example` file to `.env` and fill in the required entries
- Run `npm run dev` to develop

### Server

- Copy and edit the `.env.example` file to `.env`
- Check and update dependencies by running `composer update`
- `composer install`
- `php artisan key:generate`
- Make sure to have a mysql connection. If you are using a virtualhost, run a mysql server
- `php artisan migrate`
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

#### In case Expo Go doesn't connect

Try connecting through tunnel instead of LAN. **Note: It may be slower to connect, so it is not recommended to use**. [See this StackOverflow question](https://stackoverflow.com/questions/66766591/expo-error-starting-tunnel-failed-to-install-expo-ngrok2-4-3-globally)

- `npm i @expo/ngrok`
- **Install ngrok for your system. Good luck.**
- `ngrok http 3000` (Run this in another terminal window)
- `npx expo start --tunnel`

## Notes

- [React Router](https://reactrouter.com/en/main/start/tutorial)
  - Gives client the SPA functionality
  - Lots of features. Nice to play around with. Give it a try
  - **It is recommended to use the new [data router](https://reactrouter.com/en/main/routers/create-browser-router), so this is what has been used for the project**
    - [A good example of implementation](https://github.com/remix-run/react-router/blob/dev/examples/data-router/src/app.tsx)
- [React Native Paper](https://callstack.github.io/react-native-paper/)
  - Component and theming library for mobile
  - [Theming](https://callstack.github.io/react-native-paper/docs/guides/theming) has already been setup
    - Change the theming in `app/_layout.jsx`
    - To make the themes work, either use the `useTheme()` hook or use the components provided by the library
- [Expo Router](https://expo.github.io/router/docs)
  - Gives mobile the SPA functionality
- [React Hook Form](https://react-hook-form.com/get-started)
  - Helper library for making forms in React
  - Mostly used because React Native does not natively support forms
  - [Making React Native forms](https://react-hook-form.com/get-started#ReactNative)
- [Material Design Icons](https://materialdesignicons.com)
  - Icon library used by React Native Paper
  - Reference this when making icon buttons and the like
- [Simple QRCode](https://www.simplesoftware.io/#/docs/simple-qrcode)
  - Laravel library for generating QR codes
  - Used for generating QRs that input access codes
- [Expo Bar Code Scanner](https://docs.expo.dev/versions/latest/sdk/bar-code-scanner/)
  - React Native library for scanning QR codes, among other scannable codes
  - Used to read the QRs for access codes
- [Simple Excel](https://github.com/spatie/simple-excel)
  - Laravel library to handle csv and xlsx files
- Maybe: [NetInfo](https://github.com/react-native-netinfo/react-native-netinfo) for [Expo](https://docs.expo.dev/versions/latest/sdk/netinfo/)
  - Could be used to get some connection details
  - Another possible library: [Expo Network](https://docs.expo.dev/versions/latest/sdk/network/#networkgetmacaddressasyncinterfacename)

## Misc. Notes

- <https://www.twilio.com/blog/build-restful-api-php-laravel-sanctum>
- <https://github.com/koole/react-sanctum>
- Auth CORS errors: <https://stackoverflow.com/questions/61421547/getting-401-unauthorized-for-laravel-sanctum>
- Preventing 401 error on user after login: <https://laracasts.com/discuss/channels/vue/authenticating-a-spa-using-laravel-but-getting-401-unauthenticated-user>
- [Creating helpers in Laravel](https://stackoverflow.com/questions/28290332/how-to-create-custom-helper-functions-in-laravel)
- [Defining additional attributes in a Laravel model](https://stackoverflow.com/questions/50978034/additional-attributes-in-laravel-all-request)
- Auth for mobile and web will be different. Web is based on SPA style and works just like tutorials. Mobile should use the token and send it to a guard with the `sanctum` provider to login and logout properly. But somehow authentication works just the same either way; this takes some examination to determine what is the correct implementation for this stack.

## API

**Note: Not finalized yet. Do not refer to this yet. See actual controllers first.**

Inputs with a question mark at the end of its name ( ? ) are nullable.

Possible inputs or data types are listed in square brackets ( [] ).

## Masterlist

See [Masterlist.php](server/app/Helpers/Masterlist.php)

| Route               | Method | Inputs                             | Description                                                                                                           |
| ------------------- | ------ | ---------------------------------- | --------------------------------------------------------------------------------------------------------------------- |
| `masterlist/upload` | POST   | `overwrite?`: [0, 1] `sheet`: File | Upload the masterlist sheet to be used by the system. If overwrite is true, it will overwrite the sheet if it exists. |

## Student

| Route     | Method | Inputs                                                                                                        | Description      |
| --------- | ------ | ------------------------------------------------------------------------------------------------------------- | ---------------- |
| `student/{student_id}` | GET | - | Gets a student with that ID number.
| `student` | POST   | `student_id`: [string, 20]<br> `full_name`: [string, 70]<br> `college`: [string, 50]<br> `is_enrolled` [0, 1] | Create a Student. `full_name` and `college` and overridden by details found in the master list if the `student_id` is present there. This affects the `is_enrolled` attribute. |
| `student/{student_id}` | PUT \| PATCH | `full_name`: [string, 70]<br> `college`: [string, 50]<br> `is_enrolled` [0, 1] | Update a Student, overrides any master list details
| `student/{student_id}` | DELETE | - | Deletes a student with that ID number.
