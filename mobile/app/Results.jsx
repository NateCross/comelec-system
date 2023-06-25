import { Link, Stack } from "expo-router";
import { Text, StyleSheet, View, TouchableOpacity, Image } from "react-native";

import { icons } from "./constants";

import styles from "./Results.style";

export default function results() {
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
        <View style={styles.details}>
          <Text style={styles.title}>Voting Results</Text>
          <View style={styles.cards}>
            <View style={styles.card}>
              <View style={styles.group}>
                <Text style={styles.value}>4999</Text>
                <Image source={icons.voting} style={styles.votingIcon} />
              </View>
              <View style={styles.bottom}>
                <Text style={styles.name}>Total Votes</Text>
              </View>
            </View>
            <View style={styles.card}>
              <View style={styles.group}>
                <Text style={styles.value}>Final</Text>
                <Image source={icons.bookmark} style={styles.markIcon} />
              </View>
              <View style={styles.bottom}>
                <Text style={styles.name}>Voting Status</Text>
              </View>
            </View>
          </View>
          <View style={styles.position}>
            <Text style={styles.posName}>Position</Text>
            <Text style={styles.posValue}>/President</Text>
          </View>
        </View>
        <View style={styles.candidates}>
          <View>
            <Text style={styles.candidateTitle}>Candidates</Text>
          </View>
          <View style={styles.candidate}>
            <View style={styles.left}>
              <Image
                // source={}
                style={styles.candidateImg}
              />
              <View>
                <Text style={styles.candidateName}>John Doe</Text>
                <Text style={styles.partyName}>Party People</Text>
              </View>
            </View>
            <View style={styles.right}>
              <Text style={styles.count}>999 Votes</Text>
              <View style={styles.percentage}>
                <Text style={styles.percentageText}>25%</Text>
              </View>
            </View>
          </View>
          <View style={styles.candidate}>
            <View style={styles.left}>
              <Image
                // source={}
                style={styles.candidateImg}
              />
              <View>
                <Text style={styles.candidateName}>John Doe</Text>
                <Text style={styles.partyName}>Party People</Text>
              </View>
            </View>
            <View style={styles.right}>
              <Text style={styles.count}>999 Votes</Text>
              <View style={styles.percentage}>
                <Text style={styles.percentageText}>25%</Text>
              </View>
            </View>
          </View>
          <View style={styles.candidate}>
            <View style={styles.left}>
              <Image
                // source={}
                style={styles.candidateImg}
              />
              <View>
                <Text style={styles.candidateName}>John Doe</Text>
                <Text style={styles.partyName}>Party People</Text>
              </View>
            </View>
            <View style={styles.right}>
              <Text style={styles.count}>999 Votes</Text>
              <View style={styles.percentage}>
                <Text style={styles.percentageText}>25%</Text>
              </View>
            </View>
          </View>
          <View style={styles.candidate}>
            <View style={styles.left}>
              <Image
                // source={}
                style={styles.candidateImg}
              />
              <View>
                <Text style={styles.candidateName}>John Doe</Text>
                <Text style={styles.partyName}>Party People</Text>
              </View>
            </View>
            <View style={styles.right}>
              <Text style={styles.count}>999 Votes</Text>
              <View style={styles.percentage}>
                <Text style={styles.percentageText}>25%</Text>
              </View>
            </View>
          </View>
          <View style={styles.candidate}>
            <View style={styles.left}>
              <Image
                // source={}
                style={styles.candidateImg}
              />
              <View>
                <Text style={styles.candidateName}>John Doe</Text>
                <Text style={styles.partyName}>Party People</Text>
              </View>
            </View>
            <View style={styles.right}>
              <Text style={styles.count}>999 Votes</Text>
              <View style={styles.percentage}>
                <Text style={styles.percentageText}>25%</Text>
              </View>
            </View>
          </View>
        </View>
        <View style={styles.candidateNav}>
          <View style={styles.active}></View>
          <View style={styles.inactive}></View>
          <View style={styles.inactive}></View>
        </View>
      </View>
    </View>
  );
}
