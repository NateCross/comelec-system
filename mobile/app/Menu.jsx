import { Link, Stack, useRouter } from 'expo-router'
import { Text, View, Image, TouchableOpacity } from 'react-native'
import { useAuth } from './constants/useAuth';

import { API_URL } from 'react-native-dotenv';
import { useSanctum } from 'react-sanctum';

import { icons } from './constants';

import styles from './Menu.style'
import { useEffect, useState } from 'react';
import axios from 'axios';

export default function Menu() {
  const router = useRouter();
  const { auth, setAuth, user } = useAuth();
  const [userIsLoggedIn, setUserIsLoggedIn] = useState(false);
  console.log(auth);
  console.log(user);
  const [message, setMessage] = useState(
    'Register or Log in to vote.',
  );

  useEffect(() => {
    auth ? setMessage(`Hello, ${user?.full_name}`)
      : setMessage('Register or Log in to vote.');
    auth ? setUserIsLoggedIn(true) : setUserIsLoggedIn(false);
  }, [user]);

  function logout() {
    axios.post(
      `${API_URL}/api/account/logout`
    ).then(() => { 
      setAuth(null);
      router.replace('/')
    });
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
        <Link 
          href=""
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
          <Link href="" style={styles.link}>
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
          {
            userIsLoggedIn ?
              <TouchableOpacity
                style={styles.link}
                onPress={logout}
              >
                <View style={styles.left}>
                  <Image 
                    source={icons.user}
                    style={styles.leftIcon}
                  />
                  <Text style={styles.name}>
                    Logout
                  </Text>
                </View>
                <View style={styles.right}>
                  <Image
                    source={icons.arrowRight}
                    style={styles.rightIcon}
                  />
                </View>
              </TouchableOpacity>
            : 
              <Link 
                href={'/Auth'}
                style={styles.link}
              >
                <View style={styles.left}>
                  <Image 
                    source={icons.user}
                    style={styles.leftIcon}
                  />
                  <Text style={styles.name}>
                    Register/Login
                  </Text>
                </View>
                <View style={styles.right}>
                  <Image
                    source={icons.arrowRight}
                    style={styles.rightIcon}
                  />
                </View>
              </Link>
          }
          <Text style={styles.message}>
            {message}
          </Text>
        </View>
      </View>
    </View>
  )
};