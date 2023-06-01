import axios from 'axios';
import React, { useState } from 'react'
import { Form } from 'react-router-dom'

export default function Register() {
  const [formData, setFormData] = useState({
    email: '',
    name: '',
    password: '',
  });

  const handleSubmit = async (e) => {
    e.preventDefault();
    // const submitData = {
    //   email: formData.email
    // }
    try {
      await axios.post(
        'http://localhost:8000/api/auth/register',
        formData,
      );
    } catch (exception) {
      console.log(exception);
    }
  }

  return <>
    <h1>Register</h1>
    <div className="form-container">
      <Form method="POST" onSubmit={handleSubmit}>
        <div className="form-input-container">
          <label htmlFor="email">Email</label>
          <input 
            type="text" 
            name="email" 
            id="email" 
            value={formData.email}
            onChange={(e) => 
              setFormData({
                ...formData, 
                email: e.target.value,
              })
            } 
          />
        </div>
        <div className="form-input-container">
          <label htmlFor="name">Name</label>
          <input 
            type="text" 
            name="name" 
            id="name" 
            value={formData.name}
            onChange={(e) => 
              setFormData({
                ...formData, 
                name: e.target.value,
              })
            } 
          />
        </div>
        <div className="form-input-container">
          <label htmlFor="password">Password</label>
          <input 
            type="password" 
            name="password" 
            id="password" 
            value={formData.password}
            onChange={(e) => 
              setFormData({
                ...formData, 
                password: e.target.value,
              })
            } 
          />
        </div>
        <div className="form-submit-container">
          <input type="submit" value="Submit" />
        </div>
      </Form>
    </div>
  </>
}
