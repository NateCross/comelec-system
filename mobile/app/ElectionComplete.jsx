import { Link, Stack } from "expo-router";
import { Text, View, TouchableOpacity, Image } from "react-native";

import { icons } from "./constants";
import { API_URL } from 'react-native-dotenv';
import styles from "./ElectionComplete.style";
import { useEffect, useState } from "react";
import axios from "axios";

export default function ElectionComplete() {
  const [message, setMessage] = useState(
    'Loading...',
  );

  useEffect(() => {
    axios.get(
      `${API_URL}/api/message/end_of_voting`,
    ).then((response) => {
      setMessage(response?.data);
    });
  }, []);

  return(
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
      <View style={styles.main}>
        <View style={styles.accessDetails}>
          <Image
            source={icons.check}
            style={styles.image}
          />
          <Text style={styles.message}>{message}</Text>
        </View>
        <Link style={styles.secondaryButton} href="/">
          <TouchableOpacity>
            <Text style={styles.primaryText}>Return to Announcement</Text>
          </TouchableOpacity>
        </Link>
      </View>
    </View>
  );
}

