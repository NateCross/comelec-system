import { StyleSheet } from "react-native";

import { COLORS, SIZES } from './constants';

const styles = StyleSheet.create ({
  container: {
    backgroundColor: COLORS.body,
    paddingHorizontal: 30,
    paddingVertical: 10,
    minHeight: '100%',
  },
  main: {
    flex: 1,
    justifyContent: 'space-between',
    alignItems: 'center',
    textAlign: 'center',
  },
  header: {
    fontSize: 24,
    fontWeight: 'bold',
  },
  centerContent: {
    textAlign: 'center',
  },
  image: {
    maxWidth: 140,
    maxHeight: 140,
    alignSelf: 'center',
  },
  description: {
    marginTop: 20,
    textAlign: 'center',
    fontSize: 16,
    fontWeight: 'bold',
  },
  group: {
    alignItems: 'center',
  },
  primaryButton: {
    marginTop: 20,
    paddingHorizontal: 16,
    paddingVertical: 10,
    backgroundColor: COLORS.primary,
    minWidth: '100%',
    justifyContent: 'center',
    alignItems: 'center',
  },
  textLight: {
    color: COLORS.white,
  },
  secondaryButton: {
    marginTop: 20,
    paddingHorizontal: 16,
    paddingVertical: 10,
    backgroundColor: COLORS.tertiary,
    minWidth: '100%',
    justifyContent: 'center',
    alignItems: 'center',
    borderColor: COLORS.primary,
    borderWidth: 1,
  },
  textDark: {
    color: COLORS.black,
  },
  centerText: {
    textAlign: 'center',
  },
});

export default styles;
