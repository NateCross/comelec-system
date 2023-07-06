import { Link, Stack, useRouter } from 'expo-router'
import { Text, View, Image, TouchableOpacity } from 'react-native'
import { useAuth } from './constants/useAuth';

const API_URL = process.env.API_URL;;
import { useSanctum } from 'react-sanctum';

import { icons } from './constants';

import styles from './Menu.style'
import { useEffect, useState } from 'react';
import axios from 'axios';
import Header from './constants/Header';

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
    (auth && user) ? setMessage(`Hello, ${user?.full_name}!`)
      : setMessage('Register or Log in to vote.');
    (auth && user) ? setUserIsLoggedIn(true) : setUserIsLoggedIn(false);
  }, [user]);

  function logout() {
    axios.post(
      `${API_URL}/api/account/logout`
    ).finally(() => { 
      setAuth(null);
      router.replace('/')
    });
  }

  return (
    <View style={styles.container}>
      <Header />
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
                <View 
                  style={{
                    ...styles.left,
                    flexGrow: 0,
                    flexShrink: 1,
                    flexBasis: 'auto',
                  }}
                >
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
          {user?.id && (
            <Text style={styles.message}>
              {{
                'v': 'Account is awaiting verification.'
              }[user?.status]}
            </Text>
          )}
        </View>
      </View>
    </View>
  )
};