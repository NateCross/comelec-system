import { Link, Stack, useRouter } from "expo-router";
import { Text, View, TouchableOpacity, Image, Button, StyleSheet } from "react-native";
import { images, icons } from "./constants";
import React, { useState, useEffect } from 'react';

import { BarCodeScanner } from "expo-barcode-scanner";

import styles from "./ScanQR.style";
import Header from "./constants/Header";

export default function ScanQR() {
  const [hasPermission, setHasPermission] = useState(null);
  const [scanned, setScanned] = useState(false);
  const router = useRouter();

  useEffect(() => {
    const getBarCodeScannerPermissions = async () => {
      const { status } = await BarCodeScanner.requestPermissionsAsync();
      setHasPermission(status === 'granted');
    };

    getBarCodeScannerPermissions();
  }, []);

  const handleBarCodeScanned = ({ type, data }) => {
    const ValidQrType = 256;
    console.log(type);
    console.log(data);
    setScanned(true);
    if (type !== ValidQrType) {
      return;
    }
    router.replace({
      pathname: 'ElectionEntry',
      params: {
        code: data,
      },
    });
  };

  if (hasPermission === null) {
    return <Text>Requesting for camera permission</Text>;
  }
  if (hasPermission === false) {
    return <Text>No access to camera</Text>;
  }
  
  return(
    <View style={styles.container}>
      <Header />
      <View style={styles.main}>
        <View style={styles.pageDetails}>
          <Text style={styles.title}>Scan QR Code</Text>
          <Text style={styles.instructions}>
            Place the QR Code inside the frame and avoid shaking for scanning to be done quick.
          </Text>
        </View>
        <View style={styles.scanQR}>
          <View style={styles.qrWrapper}>
            <BarCodeScanner
              onBarCodeScanned={scanned ? undefined : handleBarCodeScanned}
              style={StyleSheet.absoluteFillObject}
            />
          </View>
        </View>
        {scanned && <Button title={'Tap to Scan Again'} onPress={() => setScanned(false)} style={styles.scanAgain}/>}
        <Link style={styles.secondaryButton} href="ElectionEntry">
          <TouchableOpacity>
            <Text style={styles.primaryText}>Return to Election Page</Text>
          </TouchableOpacity>
        </Link>
      </View>
    </View>
  );
}