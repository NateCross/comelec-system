import { View, TouchableOpacity, Image } from 'react-native'
import { TextInput, Text } from 'react-native-paper'
import { Link, Stack, useRouter } from 'expo-router'
import React, { useState } from 'react'

import { icons } from './constants'

import { useForm, Controller } from 'react-hook-form'

const API_URL = process.env.API_URL;

import axios from 'axios';

import styles from './Form.style'
import { useAuth } from './constants/useAuth'


export default function Register() {
  const { control, handleSubmit, formState: { errors } } = useForm({
    defaultValues: {
      student_id: '',
      email: '',
      full_name: '',
      password: '',
    }
  });
  const [error, setError] = useState(null);
  const { setAuth } = useAuth();
  const router = useRouter();

  async function onSubmit(data) {
    setError(null);
    try {
      const response = await axios.post(
        `${API_URL}/api/account/register`,
        {
          ...data,
        },
      );
      console.log(response);

      setAuth(`${response?.data?.token_type} ${response?.data?.access_token}`);

      router.replace("/");
    } catch (exception) {
      console.log(exception);
      setError(exception?.response?.data?.error);
    }
  }

  return (
    <View style={styles.container}>
      <Stack.Screen
        style={styles.menu}
        options={{
          headerShown: false,
        }}
      />
      <View style={styles.navbar}>
        <Link href="/Auth">
          <View style={styles.backWrapper}>
            <Image 
              source={icons.arrowLeft}
              style={styles.goBack}
            />
          </View>
        </Link>
        <View style={styles.groupTitle}>
          <Text style={styles.appTitle}>SG COMELEC</Text>
        </View>
      </View>
      <View style={styles.main}>
        <View style={styles.header}>
          <Text style={styles.title}>Register</Text>
          <Text style={styles.description}>Please fill in the form to use this app.</Text>
        </View>
        <View style={styles.fields}>
          {error && <View>
            <Text>
              {error}
            </Text>
          </View>}
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
              name='student_id'
            />
            {errors.student_id && <Text>Student ID is required</Text>}
          </View>

          <View style={styles.field}>
            <Text style={styles.name}>Email Address*</Text>
            <Controller
              style={styles.inputBox}
              control={control}
              rules={{
                required: true,
              }}
              render={({ field: { onChange, onBlur, value } }) => (
                <TextInput
                  style={styles.input}
                  placeholder='e.g., john.doe@gmail.com'
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
              name='full_name'
            />
            {errors.full_name && <Text>Name is required</Text>}
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
            <Link styles={styles.redirectLink} href="/Login">Login</Link>
          </View>
        </View>
      </View>
    </View>
  )
}