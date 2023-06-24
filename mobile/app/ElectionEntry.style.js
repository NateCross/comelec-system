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
  image: {
    marginTop: "20%",
    marginLeft: 10,
    maxWidth: 250,
    maxHeight: 200,
  },
  accessDetails: {
    marginTop: 10,
  },
  title: {
    marginTop: 10,
    textAlign: "center",
    fontSize: 20,
    fontWeight: "bold",
    color: COLORS.primary,
  },
  description: {
    marginTop: 10,
    fontSize: 16,
    textAlign: "center",
  },
  accessCode: {
    marginTop: 30,
  },
  name: {
    textAlign: "center",
    fontSize: 16,
    fontWeight: "bold",
    color: COLORS.primary,
  },
  codes: {
    marginTop: 20,
    flexDirection: "row",
  },
  code: {
    marginHorizontal: 2,
    minHeight: 45,
    minWidth: 45,
    borderColor: COLORS.primary,
    borderWidth: 1,
  },
  noCode: {
    marginTop: 20,
  },
  default: {
    textAlign: "center",
    fontSize: 16,
  },
  group: {
    flexDirection: "row",
    alignSelf: "center",
  },
  highlight: {
    marginLeft: 5,
    fontSize: 16,
    textAlign: "center",
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
    borderColor: COLORS.primary,
    color: COLORS.primary,
    fontWeight: "bold",
    borderWidth: 1,
    minWidth: "100%",
    alignItems: "center",
    paddingVertical: 15,
    borderRadius: 5,
  },
  lightText: {
    color: COLORS.white,
  },
});

export default styles;