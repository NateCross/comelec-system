// Handles the hook for auth so it's stored as global state
import { createContext, useState, useEffect } from "react";
import { storeData, readData } from './storage';
import axios from "axios";
const API_URL = process.env.API_URL;;

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
      );
      return fetchedUser?.data;
    } catch(e) {
      return null;
    }
  }

  async function refreshUser() {
    setUser(null);
    setUser(await getUser());
  }

  return (
    <Provider value={{auth, setAuth, user, refreshUser}}>
      {children}
    </Provider>
  )
}