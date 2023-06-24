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
    paddingVertical: 15,
    borderRadius: 5,
  },
});

export default styles;