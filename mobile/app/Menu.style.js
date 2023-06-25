import { StyleSheet } from "react-native";

import { COLORS, SIZES } from "./constants";

const styles =StyleSheet.create ({
  container: {
    minHeight: '100%',
    backgroundColor: COLORS.bg,
  },
  navbar: {
    marginTop: 30,
    flexDirection: "row",
    justifyContent: "space-between",
    alignItems: "center",
    paddingHorizontal: 18,
    paddingVertical: 20,
    borderBottomColor: COLORS.grey,
    borderBottomWidth: 1,
  },
  main: {
    backgroundColor: COLORS.body,
    flex: 1,
    justifyContent: "space-between",
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
  groupLink: {
    flexDirection: "row",
    justifyContent: "space-evenly",
  },
  menuButton: {
    marginLeft: 10,
    padding: 8,
    borderColor: COLORS.primary,
    // borderWidth: 1,
    borderRadius: 2,
    alignItems: "center",
    justifyContent: "center",
    maxWidth: 40,
    maxHeight: 40,
  },
  devToggle: {
    padding: 8,
    borderColor: COLORS.primary,
    // borderWidth: 1,
    borderRadius: 2,
    maxWidth: 40,
    maxHeight: 40,
  },
  wrapper: {
    alignItems: "center",
    justifyContent: "center",
  },
  devIcon: {
    minWidth: 30,
    maxWidth: 30,
    minHeight: 25,
    maxHeight: 25,
  },
  menuIcon: {
    minWidth: 25,
    maxWidth: 25,
    minHeight: 25,
    maxHeight: 25,
  },
  nav: {
    minHeight: '100%',
  },
  link: {
    flex: 1,
    flexDirection: 'row',
    maxHeight: 65,
    paddingHorizontal: 16,
    paddingVertical: 16,
    alignItems: 'center',
    justifyContent: 'space-between',
    borderColor: COLORS.white,
    borderBottomColor: COLORS.border,
    borderWidth: 2,
  },
  left: {
    flex: 1,
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'center',
  },
  hornImage: {
    transform: [{ rotate: '-25deg'}],
    maxHeight: 20,
    maxWidth: 20,
  },
  leftIcon: {
    maxHeight: 20,
    maxWidth: 20,
  },
  right: {
    flex: 1,
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'flex-end',
  },
  rightIcon: {
    maxHeight: 25,
    maxWidth: 25,
  },
  name: {
    marginLeft: 20,
    fontSize: 18,
    fontWeight: 'bold',
    color: COLORS.primary,
  },  
  message: {
    marginTop: 30,
    paddingHorizontal: 16,
    fontSize: 16,
  },
  scanAgain: {
    backgroundColor: COLORS.primary,
  },
});

export default styles;