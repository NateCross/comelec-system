import { Link, Stack } from 'expo-router';
import { Text, StyleSheet, View, TouchableOpacity, Image } from 'react-native';

import { icons } from './constants';

import styles from './Voting.style';

import { useAuth } from './constants/useAuth';

export default function Voting() {
  const { user } = useAuth();

  console.log(user);

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

