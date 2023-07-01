import { Link, Stack } from 'expo-router';
import { Text, View, TouchableOpacity, Image } from 'react-native';

// import { useSanctum } from 'react-sanctum';

import { images, icons } from './constants';

import styles from './Auth.style';

// fetch(`${API_URL}/items`).then((items) => items.json()).then((items) => console.log(items));

export default function Auth() {
  // const { authenticated, user } = useSanctum();

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
          <Text style={styles.leftTitle}>Title/</Text>
          <Text style={styles.titleRight}>Logo</Text>
        </Link>
        <View style={styles.groupLink}>
          <Link href="/Links" style={styles.devToggle}>  
            <Image
              source={icons.menu}
              style={styles.menuIcon}
            />
          </Link>
          <Link href="/Menu" style={styles.menuButton}>  
            <Image
              source={icons.menu}
              style={styles.menuIcon}
            />
          </Link>
        </View>
      </View>
      <View style={styles.main}>
        <Text style={styles.header}>SG COMELEC</Text>
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
        <Text style={styles.centerText}>Etiam placerat ullamcorper ultricies. Aenean id feugiat quam. Nam eros orci, imperdiet vel porta maximus.</Text>

        {/* { authenticated && 
          <Text variant='labelLarge'>Hi {user.name}</Text>
        } */}
      </View>
    </View>
  );
}
