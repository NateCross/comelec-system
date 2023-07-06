import { Link, Stack } from "expo-router";
import { Text, View, TouchableOpacity, Image } from "react-native";

import { icons } from "./constants";
const API_URL = process.env.API_URL;;
import styles from "./ElectionComplete.style";
import { useEffect, useState } from "react";
import axios from "axios";
import Header from "./constants/Header";

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
      <Header />
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

