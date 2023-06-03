import { StyleSheet, Text, View } from 'react-native'
import React from 'react'
import { Stack } from 'expo-router'

import { 
  PaperProvider,
  MD3LightTheme as DefaultTheme,
} from 'react-native-paper'

const theme = {
  ...DefaultTheme,
  colors: {
    ...DefaultTheme.colors,
    primary: 'tomato',
    secondary: 'yellow',
  },
}

export default function _layout(props) {
  return (
    <PaperProvider theme={theme}>
      <Stack />
      <Text>Hi</Text> 
    </PaperProvider>
  )
}

const styles = StyleSheet.create({})