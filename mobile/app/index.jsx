import { Link } from 'expo-router';
import { StatusBar } from 'expo-status-bar';
import { StyleSheet, View } from 'react-native';
import { Text } from 'react-native-paper';

import { API_URL } from 'react-native-dotenv';
import { useSanctum } from 'react-sanctum';

// fetch(`${API_URL}/items`).then((items) => items.json()).then((items) => console.log(items));

export default function App() {
  const { authenticated, user } = useSanctum();

  return (
    <View style={styles.container}>
      <Text variant='displayMedium'>Hello World</Text>
      <StatusBar style="auto" />
      <Link href='/register'>Register</Link>
      <Link href='/login'>Login</Link>

      { authenticated && 
        <Text variant='labelLarge'>Hi {user.name}</Text>
      }
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
});