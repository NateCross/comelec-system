import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'

import axios from 'axios';
import { Sanctum } from 'react-sanctum';
import { RouterProvider } from "react-router-dom";

import { API_URL } from './utils';
import routes from './routes';

// Allows useSanctum hook inside App
const sanctumConfig = {
  apiUrl: API_URL,
  csrfCookieRoute: 'sanctum/csrf-cookie',
  signInRoute: "auth/login",
  signOutRoute: "auth/logout",
  userObjectRoute: "user",
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
