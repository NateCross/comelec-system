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
  image: {
    marginLeft: 10,
    maxWidth: 250,
    maxHeight: 200,
    alignSelf: "center",
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
    alignItems: "center",
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
  option: {
    marginTop: 10,
    alignItems: "center",
  },
  optionText: {
    fontSize: 16,
    fontWeight: "bold",
    color: COLORS.primary,
  },
  qrButton: {
    marginTop: 10,
    alignItems: "center",
    alignSelf: "center",
  },
  buttonWrapper: {
    borderColor: COLORS.primary,
    borderWidth: 1,
    paddingHorizontal: 16,
    paddingVertical: 10,
    borderRadius: 2,
    flexDirection: "row",
    justifyContent: "space-evenly",
    alignItems: "center",
  },
  qrImage: {
    maxWidth: 20,
    maxHeight: 20,
    marginRight: 15,
  },
  qrText: {
    fontWeight: "bold",
    color: COLORS.primary,
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
    marginTop: 15,
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
    textAlign: "center",
    paddingVertical: 15,
    borderRadius: 5,
  },
  accessText: {
    color: COLORS.white,
  },
  primaryText: {
    color: COLORS.primary,
  },
  redirect: {
    minWidth: "100%",
  },
});

export default styles;