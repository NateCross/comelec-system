import React from 'react'
import { StyleSheet, View, Text, HeaderButton, NavigationContainer } from 'react-native'
import { Stack, Screen } from 'expo-router'
import { MaterialIcons } from '@expo/vector-icons'
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
    <PaperProvider theme={theme}>
      <Sanctum config={sanctumConfig}>
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
      </Sanctum>
    </PaperProvider>
  );
}