import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'

import axios from 'axios';
import { Sanctum } from 'react-sanctum';
import { RouterProvider } from "react-router-dom";

import { API_URL } from './utils';
import routes from './routes';

// Allows useSanctum hook inside App
// TODO: Find a way to not have to append api to
// everything since sanctum/csrf-cookie does not
// have the api route at the beginning
// Possible fix: just make everything api, therefore
// removing the api at the beginning since that's all
// the Laravel server is going to be used for?
const sanctumConfig = {
  apiUrl: API_URL,
  csrfCookieRoute: 'sanctum/csrf-cookie',
  signInRoute: "api/auth/login",
  signOutRoute: "api/auth/logout",
  userObjectRoute: "api/user",
};

// Set default for axios to allow auth support
axios.defaults.withCredentials = true;

ReactDOM.createRoot(document.getElementById('root'))
  .render(
    <React.StrictMode>
      <Sanctum config={sanctumConfig}>
        <RouterProvider router={routes} />
      </Sanctum>
    </React.StrictMode>
  )
