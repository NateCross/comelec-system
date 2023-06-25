import { Link, Stack } from "expo-router";
import { Text, View, Image } from "react-native";

import { API_URL } from "react-native-dotenv";
import { useSanctum } from "react-sanctum";

import { icons } from "./constants";

import styles from "./index.style";

export default function index() {
  const { authenticated, user } = useSanctum();

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
            Donec in neque sed lorem facilisis rhoncus. Morbi egestas diam sed
            massa vulputate, a malesuada eros lobortis. Vestibulum sed malesuada
            Vestibulum urna ante, tempor non ligula nec, vestibulum congue ligula.
            Donec venenatis leo vestibulum aliquam suscipit. Donec auctor sapien
            et nisl pellentesque iaculis. Mauris porta in turpis et malesuada.
            Maecenas tempus, lacus nec bibendum rhoncus, lacus lectus ornare ante,
            ac elementum ligula odio id lorem. Cras at finibus massa, sed bibendum
            est. Aliquam a nisi eu eros tempus pharetra. Donec nisi lectus,
            vestibulum in elit blandit, varius commodo lorem. Integer sollicitudin
            fringilla fringilla. Sed at magna hendrerit turpis egestas rhoncus ut
            at lectus. Vestibulum tincidunt ultrices mauris, vel euismod magna
            porta ut. Pellentesque at dolor porttitor, consectetur nisl et,
            accumsan mauris.
          </Text>
        </View>
      </View>
    </View>
  );
}
