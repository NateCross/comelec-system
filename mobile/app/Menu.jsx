import { Link, Stack } from 'expo-router'
import { Text, View, Image, } from 'react-native'

import { API_URL } from 'react-native-dotenv';
import { useSanctum } from 'react-sanctum';

import { icons } from './constants';

import styles from './Menu.style'

export default function Menu() {
  return (
    <View style={styles.container}>
      <Stack.Screen
        style={styles.menu}
        options={{
          headerShown: false,
        }}
      />
      <View style={styles.navbar}>
        <Link 
          href="/index"
          style={styles.appTitle}>
          <Text style={styles.leftTitle}>SG Comelec</Text>
        </Link>
        <View style={styles.groupLink}>
          <Link href="/Links" style={styles.devToggle}>
            <View style={styles.wrapper}>
              <Image
                source={icons.link}
                style={styles.devIcon}
              />
            </View>
          </Link>
          <Link href="" style={styles.menuButton}>
            <View style={styles.wrapper}>
              <Image
                source={icons.menu}
                style={styles.menuIcon}
              />
            </View>
          </Link>
        </View>
      </View>
      <View style={styles.main}>
        <View style={styles.nav}>
          <Link href="/index" style={styles.link}>
            <View style={styles.left}>
              <Image 
                source={icons.horn}
                style={styles.hornImage}
              />
              <Text style={styles.name}>Announcement</Text>
            </View>
            <View style={styles.right}>
              <Image
                source={icons.arrowRight}
                style={styles.rightIcon}
              />
            </View>
          </Link>
          <Link href="/Results" style={styles.link}>
            <View style={styles.left}>
              <Image 
                source={icons.election}
                style={styles.leftIcon}
              />
              <Text style={styles.name}>Results</Text>
            </View>
            <View style={styles.right}>
              <Image
                source={icons.arrowRight}
                style={styles.rightIcon}
              />
            </View>
          </Link>
          <Link href="/ElectionEntry" style={styles.link}>
            <View style={styles.left}>
              <Image 
                source={icons.votingBlue}
                style={styles.leftIcon}
              />
              <Text style={styles.name}>Vote Access</Text>
            </View>
            <View style={styles.right}>
              <Image
                source={icons.arrowRight}
                style={styles.rightIcon}
              />
            </View>
          </Link>
            <Link href="/Auth" style={styles.link}>
            <View style={styles.left}>
              <Image 
                source={icons.user}
                style={styles.leftIcon}
              />
              <Text style={styles.name}>Login/Register</Text>
            </View>
            <View style={styles.right}>
              <Image
                source={icons.arrowRight}
                style={styles.rightIcon}
              />
            </View>
          </Link>
          <Text style={styles.message}>
            Register or Log in to vote.
          </Text>
        </View>
      </View>
    </View>
  )
};