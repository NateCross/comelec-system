/**
 * Alias for the API URL that points to the backend.
 * This is where all the data is fetched, and other
 * systems are handled, like auth.
 * 
 * The URL itself is defined in the .env file,
 * so to properly run this, you must copy the
 * .env.example file to .env and fill in the URL.
 * 
 * If it is not defined, it becomes an empty string,
 * which should naturally cause an error.
 * 
 * **Note: import.meta.env is from Vite.**
 * @type {string}
 */
export const API_URL = import.meta.env?.VITE_API_URL || '';