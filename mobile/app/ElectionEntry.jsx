import { Link, Stack } from "expo-router";
import { Text, View, TouchableOpacity, Image } from "react-native";
import { images, icons } from "./constants";

import styles from "./ElectionEntry.style";

export default function electionEntry() {
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
          <View style={styles.electionDetails}>
            <Text style={styles.title}>[ Election Name ]</Text>
            <Text style={styles.description}>The election period is ongoing.</Text>
          </View>
          <View style={styles.accessCode}>
            <Text style={styles.name}>Verify Access Code</Text>
            <View style={styles.codes}>
              <View style={styles.code}></View>
              <View style={styles.code}></View>
              <View style={styles.code}></View>
              <View style={styles.code}></View>
              <View style={styles.code}></View>
              <View style={styles.code}></View>
            </View>
            <View style={styles.noCode}>
              <Text style={styles.default}>Don't have a code?</Text>
              <View style={styles.group}>
                <Text style={styles.default}>Approach a</Text>
                <Text style={styles.highlight}>Poll Worker</Text>
              </View>
            </View>
          </View>
        </View>
        <View style={styles.actions}>
          <TouchableOpacity style={styles.primaryButton}>
            <Link href="./index" style={styles.lightText}>Enter Access Code</Link>
          </TouchableOpacity>
          <TouchableOpacity style={styles.secondaryButton}>
            <Link href="/index">Return to Announcement</Link>
          </TouchableOpacity>
        </View>
      </View>
    </View>
  );
}