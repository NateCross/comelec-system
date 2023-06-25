import { View, TouchableOpacity, Image } from 'react-native'
import { TextInput, Text } from 'react-native-paper'
import React from 'react'
import { useRouter, Stack, Link } from 'expo-router'

import { API_URL } from 'react-native-dotenv'

import { useForm, Controller } from 'react-hook-form'
import { useSanctum } from 'react-sanctum';
import axios from 'axios'
import { deviceName } from 'expo-device'

import { icons } from './constants'

import styles from './Form.style'

export default function Login() {
  const { control, handleSubmit, formState: { errors } } = useForm({
    defaultValues: {
      email: '',
      password: '',
      remember: false,
    }
  });
  const { setUser } = useSanctum();
  const router = useRouter();

  /**
   * Submits login form to the API.
   * 
   * The signIn method provided by the useSanctum() hook
   * does not seem to work on mobile with the server.
   * As such, we instead manually get the auth token 
   * first to authenticate the user and use that in an 
   * authorization header to get the user itself.
   * 
   * Then, we redirect back to the home page.
   * @param {*} data Form data
   */
  async function onSubmit(data) {
    try {
      const { data: token } = await axios.post(
        `${API_URL}/auth/token`,
        { ...data, device_name: deviceName },
      );

      const { data: user } = await axios.get(
        `${API_URL}/user`,
        {
          headers: {
            'Authorization': `Bearer ${token}`,
          },  
        }
      )

      setUser(user, true);

      router.replace("/");
    } catch (exception) {
      console.log(exception);
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
          <Text style={styles.title}>Login</Text>
          <Text style={styles.description}>Welcome back, log in to vote!</Text>
        </View>
        <View style={styles.fields}>
          <View style={styles.field}>
            <Text style={styles.name}>Student ID</Text>
            <Controller
              style={styles.inputBox}
              control={control}
              rules={{
              required: true,
              }}
              render={({ field: { onChange, onBlur, value } }) => (
                <TextInput
                  style={styles.input}
                  placeholder='Email'
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
            <Text style={styles.name}>Password</Text>
            <Controller
              style={styles.inputBox}
              control={control}
              rules={{
                required: true,
              }}
              render={({ field: { onChange, onBlur, value } }) => (
                <TextInput
                  style={styles.input}
                  placeholder='Password'
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
            <Text style={styles.actionText}>Login</Text>
          </TouchableOpacity>
          <View style={styles.redirect}>
            <Text style={styles.redirectText}>Already have an account?</Text>
            <Link styles={styles.redirectLink} href="/Register">Register</Link>
          </View>
        </View>
      </View>
  </View>
  )
}