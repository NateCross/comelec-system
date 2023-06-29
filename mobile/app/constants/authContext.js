// Handles the hook for auth so it's stored as global state
import { createContext, useState, useEffect } from "react";
import { storeData, readData } from './storage';
import axios from "axios";
import { API_URL } from 'react-native-dotenv';

export const AuthContext = createContext();

const { Provider } = AuthContext;

export const AuthProvider = ({ children }) => {
  const [auth, setAuth] = useState(null);
  const [user, setUser] = useState(null);

  // Run on first load
  useEffect(() => {
    // Immediately call async function to prevent
    // useEffect from returning a promise
    (async () => {
      const token = await readData('authToken');
      setAuth(token);
    })();
  }, []);

  // TODO: Optimize getting user
  useEffect(() => {
    (async () => {
      storeData('authToken', auth);
      axios.defaults.headers.common['Authorization'] =
        auth;
      setUser(await getUser());
    })();
  }, [auth]);

  async function getUser() {
    if (!auth) return null;

    try {
      const fetchedUser = await axios.get(
        `${API_URL}/api/account/info`,
        // {
        //   headers: {
        //     'Authorization': auth,
        //   }
        // }
      );
      return fetchedUser?.data;
    } catch(e) {
      return null;
    }
  }

  return (
    <Provider value={{auth, setAuth, user}}>
      {children}
    </Provider>
  )
}