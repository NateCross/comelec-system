import { useState } from 'react'
import './App.css'

import axios from 'axios';
import { Link, Outlet } from 'react-router-dom';

axios.get(
  `${import.meta.env.VITE_API_URL}/items`
).then((result) => { console.log(result.data) });

function App() {
  return (
    <>
      <div className="register-login-container">
        <Link to='register'>Register</Link>
        <Link to='login'>Login</Link>
      </div>

      <div className="outlet">
        <Outlet />
      </div>
    </>
  )
}

export default App
