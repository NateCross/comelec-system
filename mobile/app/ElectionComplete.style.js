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
  accessDetails: {
    alignItems: "center",
  },
  image: {
    marginTop: "50%",
    maxWidth: 100,
    maxHeight: 100,
  },
  message: {
    marginTop: 30,
    fontSize: 20,
    color: COLORS.primary,
    fontWeight: "bold",
  },
  primaryButton: {
    backgroundColor: COLORS.primary,
    borderColor: COLORS.primary,
    borderWidth: 1,
    minWidth: "100%",
    alignItems: "center",
    paddingVertical: 15,
    borderRadius: 5,
  },
  secondaryButton: {
    backgroundColor: COLORS.white,
    color: COLORS.primary,
    borderColor: COLORS.primary,
    color: COLORS.primary,
    fontWeight: "bold",
    borderWidth: 1,
    minWidth: "100%",
    alignItems: "center",
    paddingVertical: 15,
    borderRadius: 5,
  },
});

export default styles;