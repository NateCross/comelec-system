import { Link, Stack } from "expo-router";
import { Text, View, TouchableOpacity, Image } from "react-native";
import { images, icons } from "./constants";
import { useAuth } from "./constants/useAuth";

import styles from "./ElectionEntry.style";

export default function electionEntry() {
  const { user } = useAuth();
  console.log(user);

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
        {user && <>
          <Text>
            Hi, {user?.full_name}
          </Text>
        </>}
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
            <View style={styles.option}>
              <Text style={styles.optionText}>or</Text>
            </View>
          </View>
          <Link style={styles.qrButton} href="/ScanQR">
            <View style={styles.buttonWrapper}>
              <Image
                source={icons.qr}
                style={styles.qrImage}
              />
              <Text style={styles.qrText}>QR Scan</Text>
            </View>
          </Link>
        </View>
        <View style={styles.actions}>
          <View style={styles.noCode}>
            <Text style={styles.default}>Don't have a code?</Text>
            <View style={styles.group}>
              <Text style={styles.default}>Approach a</Text>
              <Text style={styles.highlight}>Poll Worker</Text>
            </View>
          </View>
          <TouchableOpacity style={styles.primaryButton}>
            <Link href="" style={styles.accessText}>Enter Access Code</Link>
          </TouchableOpacity>
          <Link style={styles.secondaryButton} href="">
            <TouchableOpacity>
              <Text style={styles.primaryText}>Return to Announcement</Text>
            </TouchableOpacity>
          </Link>
        </View>
      </View>
    </View>
  );
}