import { View, Text, Image } from 'react-native'
import React from 'react'
import { icons } from '../constants'
import styles from '../index.style'
import { usePathname, Link, Stack } from 'expo-router'

export default function Header() {
  const pathname = usePathname();
  console.log(pathname);
  console.log("Hi");

  return <>
    <Stack.Screen
      style={styles.menu}
      options={{
        headerShown: false,
      }}
    />
    <View style={styles.navbar}>
      <Link 
        href="/"
        style={styles.appTitle}>
        <Text style={styles.leftTitle}>SG Comelec</Text>
      </Link>
      <View style={styles.groupLink}>
        <Link href="/Menu" style={styles.menuButton}>
          <View style={styles.wrapper}>
            <Image
              source={icons.menu}
              style={styles.menuIcon}
            />
          </View>
        </Link>
      </View>
    </View>
  </>
}