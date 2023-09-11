import React from 'react'
import { StyleSheet, View, Text, HeaderButton, NavigationContainer } from 'react-native'
import { Stack, Screen } from 'expo-router'
import { MaterialIcons } from '@expo/vector-icons'
import axios from 'axios'

const API_URL = process.env.API_URL;

import { 
  PaperProvider,
  MD3LightTheme as DefaultTheme,ck
} from 'react-native-paper'
import { AuthProvider } from './constants/authContext'

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
  signInRoute: "api/account/login",
  signOutRoute: "api/account/logout",
  userObjectRoute: "api/account/info",
};

// Set default for axios to allow auth support
axios.defaults.withCredentials = true;

const MaterialHeaderButton = (props) => (
  <HeaderButton
    {...props}
    IconComponent={MaterialIcons}
    iconSize={23}
    color="white"
  />
);

export default function _index() {
  return (
      <AuthProvider>
    <PaperProvider theme={theme}>
        <Stack>
          <Screen
            options={{
              headerTitle: 'Title/Logo',
              headerRight: () => (
                <View>
                  <Text>Test</Text>
                </View>
              ),
              headerShown: false,
            }}
          />
        </Stack>
    </PaperProvider>
    </AuthProvider>
  );
}