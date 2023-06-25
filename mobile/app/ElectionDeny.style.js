import { StyleSheet } from "react-native";
import { COLORS, SIZES } from "./constants";

const styles = StyleSheet.create ({
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
    paddingHorizontal: 18,
    paddingVertical: 10,
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
  accessDetails: {
    alignItems: "center",
  },
  image: {
    marginTop: "30%",
    maxWidth: 250,
    maxHeight: 200,
  },
  message: {
    marginTop: 10,
    fontSize: 20,
    color: COLORS.primary,
    fontWeight: "bold",
  },
  primaryButton: {
    marginTop: 10,
    backgroundColor: COLORS.primary,
    borderColor: COLORS.primary,
    borderWidth: 1,
    minWidth: "100%",
    alignItems: "center",
    paddingVertical: 15,
    borderRadius: 5,
  },
  secondaryButton: {
    marginTop: 10,
    backgroundColor: COLORS.white,
    color: COLORS.primary,
    borderColor: COLORS.primary,
    borderWidth: 1,
    minWidth: "100%",
    alignItems: "center",
    textAlign: "center",  
    paddingVertical: 15,
    borderRadius: 5,
  },
  primaryText: {
    color: COLORS.primary,
  },
});

export default styles;