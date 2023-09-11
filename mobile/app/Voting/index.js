import { View, Text } from 'react-native'
import React, { useEffect } from 'react'
import { Redirect } from 'expo-router'
import { storeData } from '../constants/storage';

export default function index() {
  useEffect(() => {
    storeData('voted-candidates', null);
  }, []);

  return (
    <Redirect href={'Voting/1'}/>
  )
}