import { StyleSheet } from "react-native";

import { COLORS, SIZES } from './constants';

const styles = StyleSheet.create ({
  container: {
    backgroundColor: COLORS.body,
    minHeight: "100%",
  },
  navbar: {
    transform: [{scale: 0}],
    flexDirection: "row",
    justifyContent: "space-between",
    alignItems: "center",
    borderBottomColor: COLORS.grey,
    borderBottomWidth: 1,
  },
  main: {
    paddingHorizontal: 18,
    paddingVertical: 10,
    backgroundColor: COLORS.body,
    flex: 1,
    alignItems: "center",
    justifyContent: "space-between",
  },
  groupLink: {
    flexDirection: "row",
    justifyContent: "space-evenly",
  },
  menuButton: {
    marginLeft: 10,
    padding: 8,
    borderColor: COLORS.secondary,
    backgroundColor: COLORS.grey,
    borderWidth: 1,
    borderRadius: 2,
    maxWidth: 40,
    maxHeight: 40,
  },
  devToggle: {
    padding: 8,
    borderColor: COLORS.primary,
    backgroundColor: COLORS.primary,
    borderWidth: 1,
    borderRadius: 2,
    maxWidth: 40,
    maxHeight: 40,
  },
  menuIcon: {
    marginLeft: 10,
    minWidth: 20,
    maxWidth: 20,
    minHeight: 20,
    maxHeight: 20,
    resizeMode: "contain",
  },
  appTitle: {
    fontSize: 22,
    fontWeight: "bold",
    flexDirection: "row",
    gap: 20,
  },
  leftTitle: {
    color: COLORS.primary,
  },
  rightTitle: {
    color: COLORS.grey,
  },
  header: {
    fontSize: 24,
    fontWeight: 'bold',
    color: COLORS.primary,
  },
  centerContent: {
    textAlign: 'center',
  },
  image: {
    maxWidth: 160,
    maxHeight: 160,
    alignSelf: 'center',
  },
  description: {
    marginTop: 40,
    textAlign: 'center',
    fontSize: 16,
    color: COLORS.primary,
    fontWeight: 'bold',
  },
  group: {
    marginTop: 20,
    alignItems: 'center',
  },
  primaryButton: {
    marginTop: 20,
    paddingHorizontal: 16,
    paddingVertical: 15,
    backgroundColor: COLORS.primary,
    minWidth: '100%',
    justifyContent: 'center',
    alignItems: 'center',
    textAlign: 'center',
  },
  textLight: {
    fontWeight: "bold",
    color: COLORS.white,
  },
  secondaryButton: {
    marginTop: 10,
    paddingHorizontal: 16,
    paddingVertical: 15,
    backgroundColor: COLORS.tertiary,
    minWidth: '100%',
    justifyContent: 'center',
    alignItems: 'center', 
    textAlign: 'center',
    borderColor: COLORS.primary,
    borderWidth: 1,
  },
  textDark: {
    fontWeight: "bold",
    color: COLORS.primary,
  },
  centerText: {
    textAlign: 'center',
  },
});

export default styles;
