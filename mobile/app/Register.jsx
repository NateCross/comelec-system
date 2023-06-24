import { View, TouchableOpacity } from 'react-native'
import { TextInput, Text } from 'react-native-paper'
import React from 'react'

import { useForm, Controller } from 'react-hook-form'

import { API_URL } from 'react-native-dotenv'
import axios from 'axios';

import styles from './Form.style'

export default function Register() {
  const { control, handleSubmit, formState: { errors } } = useForm({
    defaultValues: {
      email: '',
      name: '',
      password: '',
    }
  });

  async function onSubmit(data) {
    try {
      await axios.post(
        `${API_URL}/auth/register`,
        data,
      );
    } catch (exception) {
      console.log(exception);
    }
  }

  return (
    <View style={styles.container}>
      <View style={styles.header}>
        <Text style={styles.title}>Register</Text>
        <Text style={styles.description}>Register to join and vote!</Text>
      </View>
      <View style={styles.fields}>
        <View style={styles.field}>
          <Text style={styles.name}>Student ID*</Text>
          <Controller
            style={styles.inputBox}
            control={control}
            rules={{
              required: true,
            }}
            render={({ field: { onChange, onBlur, value } }) => (
              <TextInput
                style={styles.input}
                placeholder='e.g., 123456789'
                onBlur={onBlur}
                onChangeText={onChange}
                value={value}
              />
            )}
            name='email'
          />
          {errors.email && <Text>Email is required</Text>}
        </View>
                
        <View style={styles.field}>
          <Text style={styles.name}>Name*</Text>
          <Controller
            style={styles.inputBox}
            control={control}
            rules={{
              required: true,
            }}
            render={({ field: { onChange, onBlur, value } }) => (
              <TextInput
                style={styles.input}
                placeholder='e.g., John Doe'
                onBlur={onBlur}
                onChangeText={onChange}
                value={value}
              />
            )}
            name='name'
          />
          {errors.name && <Text>Name is required</Text>}
        </View>


        <View style={styles.field}>
          <Text style={styles.name}>Email*</Text>
          <Controller
            style={styles.inputBox}
            control={control}
            rules={{
              required: true,
            }}
            render={({ field: { onChange, onBlur, value } }) => (
              <TextInput
                style={styles.input}
                placeholder='e.g., someone@example.com'
                onBlur={onBlur}
                onChangeText={onChange}
                value={value}
              />
            )}
            name='email'
          />
          {errors.email && <Text>Email is required</Text>}
        </View>

        <View style={styles.field}>
          <Text style={styles.name}>Password*</Text>
          <Controller
            style={styles.inputBox}
            control={control}
            rules={{
              required: true,
            }}
            render={({ field: { onChange, onBlur, value } }) => (
              <TextInput
                style={styles.input}  
                placeholder='Enter Password'
                onBlur={onBlur}
                onChangeText={onChange}
                value={value}
                secureTextEntry
              />
            )}
            name='password'
          />
          {errors.password && <Text>Password is required</Text>}
        </View>
      </View>

      <View style={styles.actions}>
        <TouchableOpacity style={styles.button} onPress={handleSubmit(onSubmit)}>
          <Text style={styles.actionText}>Register</Text>
        </TouchableOpacity>
        <View style={styles.redirect}>
          <Text style={styles.redirectText}>Already have an account?</Text>
          <Text styles={styles.link}>Login</Text>
        </View>
      </View>
    </View>
  )
}