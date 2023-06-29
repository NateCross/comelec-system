import React, { useEffect, useState } from "react";
import { Link, Stack } from "expo-router";
import { Text, View, Image } from "react-native";

import { API_URL } from "react-native-dotenv";
import { useAuth } from "./constants/useAuth";

import { icons } from "./constants";

import styles from "./index.style";
import axios from "axios";

export default function index() {
  const [announcement, setAnnouncement] = useState(
    'Loading announcement...'
  );
  const { user, auth } = useAuth();

  console.log(auth);

  // Run on first load
  useEffect(() => {
    axios
      .get(`${API_URL}/api/announcement`)
      .then((response) => {
        setAnnouncement(
          response
            ?.data
            ?.announcement
            ?.text
        )
      }).catch(() => {
        setAnnouncement('Failed to retrieve announcement.');
      });
  }, []);

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
        <View style={styles.group}>
          <View style={styles.header}>
            <Text style={styles.latest}>Latest</Text>
            <View style={styles.hr}></View>
            <Image source={icons.horn} style={styles.hornImage} />
          </View>
          <View>
            <Text style={styles.announcement}>Announcement</Text>
          </View>
        </View>
        <View style={styles.article}>
          <Text style={styles.articleText}>
            {announcement}
          </Text>
        </View>
      </View>
    </View>
  );
}
