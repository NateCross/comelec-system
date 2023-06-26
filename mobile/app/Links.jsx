import { Link, Stack } from "expo-router";
import { Text, View, Image } from "react-native";

import { API_URL } from "react-native-dotenv";
import { useSanctum } from "react-sanctum";

import { icons } from "./constants";

import styles from "./Links.style";

export default function Links() {
  return (
    <View style={styles.container}>
      <View style={styles.links}>
        <Link style={styles.link} href="/Menu">
          Menu
        </Link>
        <Link style={styles.link} href="">
          Announcements
        </Link>
        <Link style={styles.link} href="/Auth">
          Auth
        </Link>
        <Link style={styles.link} href="/Login">
          Login
        </Link>
        <Link style={styles.link} href="/Register">
          Register
        </Link>
        <Link style={styles.link} href="/ScanQR">
          QR Page
        </Link>
        <Link style={styles.link} href="/ElectionEntry">
          Election Entry
        </Link>
        <Link style={styles.link} href="/ElectionDeny">
          Election Deny
        </Link>
        <Link style={styles.link} href="/ElectionComplete">
          Election Complete
        </Link>
        <Link style={styles.link} href="/Voting">
          Voting
        </Link>
      </View>
    </View>
  );
}
