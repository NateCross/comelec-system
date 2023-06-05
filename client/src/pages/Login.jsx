import React, { useState } from 'react';
import { Form, redirect } from 'react-router-dom';
import { useSanctum } from 'react-sanctum';

export default function Login() {
  const { authenticated, user, signIn } = useSanctum();

  const [formData, setFormData] = useState({
    email: '',
    password: '',
    remember: false,
  });

  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    })
  }

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const res = await signIn(
        formData.email, 
        formData.password, 
        formData.remember,
      );
      console.log(res);
      window.alert("Signed in!");
    } catch (exception) {
      console.log(exception.message);
    }
  }

  return <>
    <h1>Login</h1>
    <div className="form-container">
      <Form method="POST" onSubmit={handleSubmit}>
        <div className="form-input-container">
          <label htmlFor="email">Email</label>
          <input 
            type="text" 
            name="email" 
            id="email" 
            value={formData.email}
            onChange={handleChange} 
          />
        </div>
        <div className="form-input-container">
          <label htmlFor="password">Password</label>
          <input 
            type="password" 
            name="password" 
            id="password" 
            value={formData.password}
            onChange={handleChange} 
          />
        </div>
        <div className="form-input-container">
          <label htmlFor="remember">Remember Me</label>
          <input 
            type="checkbox" 
            name="remember" 
            id="remember" 
            checked={formData.remember}
            onChange={() => (
              setFormData({
                ...formData,
                remember: !formData.remember,
              })
            )} 
          />
        </div>
        <div className="form-submit-container">
          <input type="submit" value="Submit" />
        </div>
      </Form>
    </div>
  </>
}
