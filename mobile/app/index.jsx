import { Link } from 'expo-router';
import { StatusBar } from 'expo-status-bar';
import { StyleSheet, View } from 'react-native';
import { Text } from 'react-native-paper';

import { API_URL } from 'react-native-dotenv';

fetch(`${API_URL}/items`).then((items) => items.json()).then((items) => console.log(items));

export default function App() {
  return (
    <View style={styles.container}>
      <Text variant='displayMedium'>This text has been changed again!</Text>
      <StatusBar style="auto" />
      <Link href='/register'>Register</Link>
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
