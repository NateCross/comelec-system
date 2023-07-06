import { Link, Stack } from "expo-router";
import { Text, View, TouchableOpacity, Image } from "react-native";

import { images, icons } from "./constants";

import styles from "./ElectionDeny.style";
import { useEffect, useState } from "react";
import axios from "axios";
import Header from "./constants/Header";
const API_URL = process.env.API_URL;;

export default function noAccess() {
  const [message, setMessage] = useState(
    'Loading...',
  );

  useEffect(() => {
    axios.get(
      `${API_URL}/api/message/voting_no_election`,
    ).then((response) => {
      setMessage(response?.data);
    });
  }, []);

  return(
    <View style={styles.container}>
      <Header />
      <View style={styles.main}>
        <View style={styles.accessDetails}>
          <Image
            source={images.election}
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