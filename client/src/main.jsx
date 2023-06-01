import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App.jsx'
import './index.css'

import axios from 'axios';
import { Sanctum } from 'react-sanctum';

// Allows useSanctum hook inside App
const sanctumConfig = {
  apiUrl: import.meta.env.VITE_API_URL,
  csrfCookieRoute: 'sanctum/csrf-cookie',
  signInRoute: "auth/login",
  signOutRoute: "auth/logout",
  userObjectRoute: "user",
};

axios.defaults.withCredentials = true;

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <Sanctum config={sanctumConfig}>
      <App />
    </Sanctum>
  </React.StrictMode>,
)
