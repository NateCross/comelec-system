/**
 * This file is where routes are defined.
 * It is separated so as to not bloat the main.jsx file.
 * 
 * Import routes.jsx in main.jsx as the router prop
 * for the RouterProvider component
 * 
 * See README.md for more notes on React Router
 * and a working example that should ideally be followed
 */
import React from "react";
import { createBrowserRouter } from "react-router-dom";

/////////////////////////////
///// Import pages here /////
/////////////////////////////
import App from './App.jsx'
import Register from './pages/Register.jsx';
import Login from './pages/Login.jsx';

//////////////////////////////
///// Define routes here /////
//////////////////////////////
const routes = createBrowserRouter([{
  path: "/",

  // App route defines the main layout used for all pages
  // Suggested to put header and footer here
  element: <App />,

  children: [
    {
      path: "register",
      element: <Register />,
    },
    {
      path: 'login',
      element: <Login />
    },
  ],
}]);

export default routes;