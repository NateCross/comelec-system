// Handles accessing local storage
// Taken from https://react-native-async-storage.github.io/async-storage/docs/usage/
import AsyncStorage from 
  '@react-native-async-storage/async-storage';

export async function storeData(key, value) {
  try {
    // const jsonValue = JSON.stringify(value);
    await AsyncStorage.setItem(key, value);
    return true;
  } catch (e) {
    return false;
  }
}

export async function storeDataJson(key, value) {
  try {
    const jsonValue = JSON.stringify(value);
    await AsyncStorage.setItem(key, jsonValue);
    return true;
  } catch (e) {
    return false;
  }
}

export async function readData(key) {
  try {
    const value = await AsyncStorage.getItem(key);
    return value;
  } catch (e) {
    return null;
  }
}

export async function readDataJson(key) {
  try {
    const jsonValue = await AsyncStorage.getItem(key);
    return jsonValue != null ? JSON.parse(jsonValue) : null;
  } catch (e) {
    return null
  }
}