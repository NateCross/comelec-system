import { Link, Stack, useSearchParams } from "expo-router";
import { Text, StyleSheet, View, TouchableOpacity, Image } from "react-native";

import { icons } from "../constants";
import { API_URL } from 'react-native-dotenv';

import styles from "./Results.style";
import votingStyles from '../Voting/Voting.style';

import { useAuth } from "../constants/useAuth";
import { useEffect, useState } from "react";
import axios from "axios";

export default function results() {
  // const { auth, user } = useAuth();

  const [election, setElection] = useState(null);
  const [candidates, setCandidates] = useState(null);
  const [positions, setPositions] = useState(null);
  const [currentPosition, setCurrentPosition] = useState(null);
  const [candidatePosition, setCandidatePosition] = useState(null);
  const [numOfVotes, setNumOfVotes] = useState(null);

  const { page } = useSearchParams();

  // Run on first load
  useEffect(() => {
    axios.get(
      `${API_URL}/api/election/results`,
    ).then((value) => {
      setElection(value?.data);
      setCandidates(value?.data?.election?.candidates);
    });
  }, [])

  // Get positions from candidates
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

    const index = page - 1;
    const positionId = positions[index]?.id;

    setCurrentPosition(positions[index]);

    const filtered = candidates?.filter((value) => (
      value?.position_id === positionId
    ));
    setCandidatePosition(filtered);

    const totalVotesInPage = filtered.reduce((accumulator, current) => (
      accumulator + current?.pivot?.num_of_votes
    ), 0);
    setNumOfVotes(totalVotesInPage);
  }, [candidates]);

  console.log(election);
  console.log(candidates);
  console.log(positions);
  console.log(candidatePosition);

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
        <View style={styles.details}>
          <Text style={styles.title}>Voting Results</Text>
          <View style={styles.cards}>
            <View style={styles.card}>
              <View style={styles.group}>
                <Text style={styles.value}>
                  {numOfVotes && 
                    numOfVotes
                  }
                </Text>
                <Image source={icons.voting} style={styles.votingIcon} />
              </View>
              <View style={styles.bottom}>
                <Text style={styles.name}>Total Votes</Text>
              </View>
            </View>
            <View style={styles.card}>
              <View style={styles.group}>
                <Text style={styles.value}>
                  {election &&
                    {
                      'a': 'Active',
                      'f': 'Final',
                    }[election?.election?.status]
                  }
                </Text>
                <Image source={icons.bookmark} style={styles.markIcon} />
              </View>
              <View style={styles.bottom}>
                <Text style={styles.name}>Voting Status</Text>
              </View>
            </View>
          </View>
          <View style={styles.position}>
            <Text style={styles.posName}>
              Position
            </Text>
            <Text style={styles.posValue}>
              {currentPosition && currentPosition?.position_name}
            </Text>
          </View>
        </View>
        <View style={styles.candidates}>
          <View>
            <Text style={styles.candidateTitle}>Candidates</Text>
          </View>
          {candidatePosition?.map((value) => (
            <View style={styles.candidate}>
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
                <Text style={styles.count}>
                  {value?.pivot?.num_of_votes}
                </Text>
                <View style={styles.percentage}>
                  <Text style={styles.percentageText}>
                    {
                      value?.pivot?.num_of_votes
                      / numOfVotes * 100 || 0
                    }%
                  </Text>
                </View>
              </View>
            </View>
          ))}
        </View>
        <View style={{
          ...votingStyles.actions,
          justifyContent: 'center',
        }}>
          {Number(page) - 1 >= 1 &&
            <Link 
              style={{
                ...votingStyles.button,
                marginRight: 'auto',
              }}
              href={`/Results/${Number(page) - 1}`}
            >
              <Text style={votingStyles.name}>Previous</Text>
              <Image 
                source={icons.arrowLeft}
                style={votingStyles.image}
              />
            </Link>
          }
          {Number(page) + 1 <= positions?.length &&
            <Link 
              style={{
                ...votingStyles.button,
                marginLeft: 'auto',
              }}
              href={`/Results/${Number(page) + 1}`}
            >
              <Text style={votingStyles.name}>Next</Text>
              <Image 
                source={icons.arrowRight}
                style={votingStyles.image}
              />
            </Link>
          }
        </View>
        <View style={styles.candidateNav}>
          {positions && positions?.map((_, index) => (
            index === page - 1 ?
              <Link 
                style={styles.active}
                href={`/Results/${index + 1}`}
              ></Link>
            :
              <Link 
                style={styles.inactive}
                href={`/Results/${index + 1}`}
              ></Link>
          ))}
        </View>
      </View>
    </View>
  );
}
