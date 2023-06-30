import { Link, Redirect, Stack, useRouter, useSearchParams } from 'expo-router';
import { Text, StyleSheet, View, TouchableOpacity, Image } from 'react-native';
import { Checkbox } from 'react-native-paper';

import { icons } from '../constants';

import styles from './Voting.style';

import { API_URL } from 'react-native-dotenv';
import { useAuth } from '../constants/useAuth';
import { useEffect, useState } from 'react';
import axios from 'axios';
import { readData, readDataJson, storeData, storeDataJson } from '../constants/storage';

export default function Voting() {
  const { auth, user } = useAuth();

  const [election, setElection] = useState({
    name: 'Loading...',
  });
  const [candidates, setCandidates] = useState(null);
  const [candidatesOfPage, setCandidatesOfPage] = useState(null);
  const [positions, setPositions] = useState(null);
  const [currentPosition, setCurrentPosition] = useState(null);
  const [votedCandidates, setVotedCandidates] = useState(null);
  const [votedPageCount, setVotedPageCount] = useState(0);
  const [abstainIsChecked, setAbstainIsChecked] = useState(false);
  
  const { page } = useSearchParams();
  const router = useRouter();


  console.log(auth);
  console.log(user);
  console.log(candidates);
  console.log(election);

  // Run on first load
  useEffect(() => {
    (async () => {
      const election = await axios.get(
        `${API_URL}/api/election`
      );
      setElection(election?.data);

      const voted = await readDataJson('voted-candidates');
      console.log(voted);
      if (!voted) {
        const candidateVotes = {}
        election?.data?.candidates?.forEach((value) => (
          candidateVotes[value?.id] = false
        ));
        setVotedCandidates(candidateVotes);
      } else {
        setVotedCandidates(voted);
      }
    })();
  }, []);

  useEffect(() => {
    if (!user?.student_id) return;

    axios.get(
      `${API_URL}/api/student/${user?.student_id}/candidates`,
    ).then((result) => {
      console.log(result?.data);
      setCandidates(result?.data)
    }).catch((error) => {
      console.log(error);
    });
  }, [user])

  // Get positions
  useEffect(() => {
    if (!candidates) return;
    console.log(candidates);
    const positions = [...new Map(candidates?.map((value) => (
      [value.position.id, value.position]
    ))).values()]

    const positionsSorted = positions.sort((a, b) => (
      b.id - a.id
    ));

    setPositions(positionsSorted);
  }, [candidates])

  // Get candidates per position
  useEffect(() => {
    if (!positions) return;
    if (!candidates) return;

    const index = page - 1;
    const positionId = positions[index]?.id;

    setCurrentPosition(positions[index]);

    const filtered = candidates?.filter((value) => (
      value?.position_id === positionId
    ));

    setCandidatesOfPage(filtered);
    console.log(filtered);
  }, [positions, candidates])

  useEffect(() => {
    if (votedCandidates === null) return;
    console.log(votedCandidates);
    storeDataJson('voted-candidates', votedCandidates);
  }, [votedCandidates]);

  if (!auth) {
    return (
      <Redirect href='/Auth' />
    )
  }

  if (positions && page > positions.length) {
    return (
      <Redirect href='/Voting/1' />
    )
  }

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
          <Text style={styles.electionTitle}>{election?.name}</Text>
        </View>
        {currentPosition && votedCandidates &&
          <View style={styles.candidates}>
            <View>
              <Text style={styles.select}>
                Select {currentPosition?.num_of_elects}
              </Text>
              <Text style={styles.candidateTitle}>
                {currentPosition?.position_name}
              </Text>
            </View>
            {candidatesOfPage?.map((value) => (
              <View 
                style={styles.candidate}
                key={value?.id}
              >
                <View style={styles.left}>
                  <Image
                    // source={}
                    style={styles.candidateImg}
                  />
                  <View>
                    <Text style={styles.candidateName}>
                      {value?.student?.full_name}
                    </Text>
                    <Text style={styles.partyName}>
                      {value?.party_name || "Independent"}
                    </Text>
                  </View>
                </View>
                <View style={styles.right}>
                  <View>
                    <Checkbox
                      status={
                        votedCandidates[value?.id] ?
                          'checked' : 'unchecked'
                      }
                      onPress={() => {
                        if (votedCandidates[value?.id]) {
                          if (votedPageCount + 1 > currentPosition?.num_of_elects)
                            return;
                          setVotedPageCount(votedPageCount + 1);
                        } else {
                          setVotedPageCount(votedPageCount - 1);
                        }

                        setVotedCandidates({
                          ...votedCandidates,
                          [value?.id]: !votedCandidates[value?.id]
                        })
                      }}
                    />
                    {/* <View style={styles.input}></View> */}
                  </View>
                </View>
              </View>
            ))}
            <View style={styles.candidate}>
              <View style={styles.left}>
                <Text style={styles.abstain}>
                  I would like to abstain voting for this position
                </Text>
              </View>
              <View style={styles.right}>
                <Checkbox
                  status={
                    abstainIsChecked ?
                      'checked' : 'unchecked'
                  }
                  onPress={() => {
                    setAbstainIsChecked(!abstainIsChecked);
                    // if (votedCandidates[value?.id]) {
                    //   if (votedPageCount + 1 > currentPosition?.num_of_elects)
                    //     return;
                    //   setVotedPageCount(votedPageCount + 1);
                    // } else {
                    //   setVotedPageCount(votedPageCount - 1);
                    // }

                    // setVotedCandidates({
                    //   ...votedCandidates,
                    //   [value?.id]: !votedCandidates[value?.id]
                    // })
                  }}
                />
              </View>
            </View>
          </View>
        }
        <View style={styles.actions}>
          {Number(page) + 1 <= positions?.length ?
            <Link 
              style={styles.button}
              href={`/Voting/${Number(page) + 1}`}
            >
              <Text style={styles.name}>Next</Text>
              <Image 
                source={icons.arrowRight}
                style={styles.image}
              />
            </Link>
            :
            <TouchableOpacity
              style={styles.button}
              onPress={() => {
                axios.post(
                  `${API_URL}/api/election/vote`,
                  {
                    votes: votedCandidates,
                  }
                ).then((value) => {
                  router.replace('/ElectionComplete');                 
                });
              }} 
            >
              <Text style={styles.name}>Submit</Text>
              <Image 
                source={icons.arrowRight}
                style={styles.image}
              />

            </TouchableOpacity>

          }
        </View>
      </View>
    </View>
  );
}

