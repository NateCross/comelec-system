import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App.jsx'
import './index.css'

import axios from 'axios';
import { Sanctum } from 'react-sanctum';
import {
  createBrowserRouter,
  RouterProvider,
} from "react-router-dom";
import Register from './pages/Register.jsx';

// Allows useSanctum hook inside App
const sanctumConfig = {
  apiUrl: import.meta.env.VITE_API_URL,
  csrfCookieRoute: 'sanctum/csrf-cookie',
  signInRoute: "auth/login",
  signOutRoute: "auth/logout",
  userObjectRoute: "user",
};

// Set default for axios to allow auth support
axios.defaults.withCredentials = true;

// Define routes here
const router = createBrowserRouter([
  {
    path: "/",

    // App route defines the main layout used for all pages
    // Suggested to put header and footer here
    element: <App />,

    children: [
      {
        path: "register",
        element: <Register />,

        // Used for handling forms. Allows dynamic updating
        // when done this way, though the regular
        // React way should work fine, too
        // action: async ({params, request}) => {
        //   const formData = Object.fromEntries(await request.formData());
        //   const res = await axios.post({
        //     url: `http://localhost:8000/auth/register`,
        //     data: {
        //       email: formData.email,
        //       password: formData.password,
        //       name: formData.name,
        //     },
        //     headers: {
        //       'Content-Type': 'application/json',
        //     }
        //   });
        //   return null;
        // },
      },
    ],
  },
]);

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <Sanctum config={sanctumConfig}>
      <RouterProvider router={router} />
    </Sanctum>
  </React.StrictMode>
)
