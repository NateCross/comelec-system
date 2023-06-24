import { Link, Stack } from "expo-router";
import { Text, View, TouchableOpacity, Image } from "react-native";

import { images, icons } from "./constants";

import styles from "./ElectionDeny.style";

export default function noAccess() {
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
        <View style={styles.accessDetails}>
          <Image
            source={images.election}
            style={styles.image}
          />
          <Text style={styles.message}>[ Custom Error Message ]</Text>
        </View>
        <TouchableOpacity style={styles.secondaryButton}>
          <Link href="/index">Return to Announcement</Link>
        </TouchableOpacity>
      </View>
    </View>
  );
}