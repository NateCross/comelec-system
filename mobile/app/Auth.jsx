import { Link, Stack } from 'expo-router';
import { Text, View, TouchableOpacity, Image } from 'react-native';

import { images, icons } from './constants';

import styles from './Auth.style';
import Header from './constants/Header';

export default function Auth() {
  return (
    <View style={styles.container}>
      <Header />
      <View 
        style={{
          ...styles.main,
          justifyContent: 'center',
        }}
      >
        <Text style={styles.header}>SG COMELEC GC</Text>
        <View style={styles.centerContent}>
          <Image 
            source={images.comelec}
            style={styles.image}
          />
          <Text style={styles.description}>Log in or Register to Vote!</Text>
          <View style={styles.group}>
            <Link style={styles.primaryButton} href="/Register">
              <TouchableOpacity>
                <Text style={styles.textLight}>Register</Text>
              </TouchableOpacity>
            </Link>
            <Link style={styles.secondaryButton} href="/Login">
              <TouchableOpacity>
                <Text style={styles.textDark}>Login</Text>
              </TouchableOpacity>
            </Link>
          </View>
        </View>
        {/* { authenticated && 
          <Text variant='labelLarge'>Hi {user.name}</Text>
        } */}
      </View>
    </View>
  );
}
