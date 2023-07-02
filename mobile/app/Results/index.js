import { View, Text } from 'react-native'
import React, { useEffect } from 'react'
import { Redirect } from 'expo-router'

export default function index() {

  // const router = useRouter();
  // useEffect(() => {
  //   router.push('Voting/1');
  // }, [])

  return (
    <Redirect href={'Results/1'}/>
  )
}