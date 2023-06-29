import { useContext } from "react";
import { AuthContext } from "./authContext";

/**
 * Returns an object of three values:
 * 
 * auth: The string token to be used for authorization
 * setAuth: Function to set the auth variable.
 *  Automatically updates in storage as well.
 * user: Function to get the current user based on the auth token.
 */
export function useAuth() {
  const { auth, setAuth, user } = useContext(AuthContext);

  return { auth, setAuth, user };
}