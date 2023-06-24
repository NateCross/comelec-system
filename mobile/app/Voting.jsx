import { Link, Stack } from 'expo-router';
import { Text, StyleSheet, View, TouchableOpacity, Image } from 'react-native';

import { icons } from './constants';

import styles from './Voting.style';

export default function Voting() {
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
        <View style={styles.details}>
          <Text style={styles.electionTitle}>[ Election Name ]</Text>
        </View>
        <View style={styles.candidates}>
          <View>
            <Text style={styles.select}>Select 1</Text>
            <Text style={styles.candidateTitle}>/President</Text>
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
              <View>
                <View style={styles.input}></View>
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
              <View>
                <View style={styles.input}></View>
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
              <View>
                <View style={styles.input}></View>
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
              <View>
                <View style={styles.input}></View>
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
              <View>
                <View style={styles.input}></View>
              </View>
            </View>
          </View>
          <View style={styles.candidate}>
            <View style={styles.left}>
              <Text style={styles.abstain}>I would like to abstain voting for this position</Text>
            </View>
            <View style={styles.right}>
              <View style={styles.input}></View>
            </View>
          </View>
        </View>
        <View style={styles.actions}>
          <TouchableOpacity style={styles.button}>
            <Text style={styles.name}>Next</Text>
            <Image 
              source={icons.arrowRight}
              style={styles.image}
            />
          </TouchableOpacity>
        </View>
      </View>
    </View>
  );
}

