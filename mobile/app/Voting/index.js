import { View, Text } from 'react-native'
import React, { useEffect } from 'react'
import { Redirect } from 'expo-router'
import { storeData } from '../constants/storage';

export default function index() {

  // const router = useRouter();
  // useEffect(() => {
  //   router.push('Voting/1');
  // }, [])

  useEffect(() => {
    storeData('voted-candidates', null);
  }, []);

  return (
    <Redirect href={'Voting/1'}/>
  )
}