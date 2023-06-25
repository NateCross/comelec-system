import { Link, Stack } from "expo-router";
import { Text, View, TouchableOpacity, Image } from "react-native";

import { icons } from "./constants";

import styles from "./ElectionComplete.style";

export default function ElectionComplete() {
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
          <Text style={styles.message}>Thank you for voting with us!</Text>
        </View>
        <Link style={styles.secondaryButton} href="">
          <TouchableOpacity>
            <Text style={styles.primaryText}>Return to Announcement</Text>
          </TouchableOpacity>
        </Link>
      </View>
    </View>
  );
}

