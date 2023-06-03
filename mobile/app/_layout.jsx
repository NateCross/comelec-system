import { StyleSheet, View } from 'react-native'
import React from 'react'
import { Stack } from 'expo-router'
import axios from 'axios'

import { API_URL } from 'react-native-dotenv'

import { 
  PaperProvider,
  MD3LightTheme as DefaultTheme,
} from 'react-native-paper'
import { Sanctum } from 'react-sanctum'

// Define theme to be used throughout the app here
const theme = {
  ...DefaultTheme,
  colors: {
    ...DefaultTheme.colors,
    primary: 'tomato',
    secondary: 'yellow',
  },
}

// Allows useSanctum hook inside app
const sanctumConfig = {
  apiUrl: API_URL,
  csrfCookieRoute: 'sanctum/csrf-cookie',
  signInRoute: "auth/login",
  signOutRoute: "auth/logout",
  userObjectRoute: "user",
};

// Set default for axios to allow auth support
axios.defaults.withCredentials = true;

export default function _layout(props) {
  return (
    <PaperProvider theme={theme}>
      <Sanctum config={sanctumConfig}>
        <Stack />
      </Sanctum>
    </PaperProvider>
  )
}

const styles = StyleSheet.create({})