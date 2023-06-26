import { StyleSheet } from "react-native";
import { COLORS, SIZES } from "./constants";

const styles = StyleSheet.create ({
  container: {
    backgroundColor: COLORS.body,
    minHeight: "100%",
  },
  navbar: {
    marginTop: 30,
    flexDirection: "row",
    justifyContent: "space-between",
    alignItems: "center",
    paddingHorizontal: 16,
    paddingVertical: 20,
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
  pageDetails: {
    alignItems: "center",
    textAlign: "center",
  },
  title: {
    marginTop: 20,
    fontSize: 20,
    fontWeight: "bold",
    color: COLORS.primary,
  },
  qrWrapper: {
    paddingVertical: 10,
    paddingHorizontal: 20,
    minWidth: "100%",
    minHeight: 460,
  },
  instructions: {
    marginTop: 20,
    paddingHorizontal: 16,
    fontSize: 16,
    color: COLORS.grey,
    textAlign: "center",
  },
  secondaryButton: {
    marginTop: 10,
    backgroundColor: COLORS.white,
    borderColor: COLORS.primary,
    color: COLORS.primary,
    fontWeight: "bold",
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
