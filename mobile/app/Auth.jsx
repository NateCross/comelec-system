import { Link, Stack } from 'expo-router';
import { Text, View, TouchableOpacity, Image } from 'react-native';

import { useSanctum } from 'react-sanctum';

import { images } from './constants';

import styles from './Auth.style';

// fetch(`${API_URL}/items`).then((items) => items.json()).then((items) => console.log(items));

export default function Auth() {
  const { authenticated, user } = useSanctum();

  return (
    <View style={styles.container}>
      <View style={styles.main}>
        <Text style={styles.header}>Title/Logo</Text>
        <View style={styles.centerContent}>
          <Image 
            source={images.comelec}
            style={styles.image}
          />
          <Text style={styles.description}>Log in or Register to Vote!</Text>
          <View style={styles.group}>
            <TouchableOpacity style={styles.primaryButton}>
              <Link style={styles.textLight} href='/Register'>Register</Link>
            </TouchableOpacity>
            <TouchableOpacity style={styles.secondaryButton}>
              <Link style={styles.textDark} href='/Login'>Login</Link>
            </TouchableOpacity>
          </View>
        </View>
        <Text style={styles.centerText}>Etiam placerat ullamcorper ultricies. Aenean id feugiat quam. Nam eros orci, imperdiet vel porta maximus.</Text>

        {/* { authenticated && 
          <Text variant='labelLarge'>Hi {user.name}</Text>
        } */}
      </View>
    </View>
  );
}
