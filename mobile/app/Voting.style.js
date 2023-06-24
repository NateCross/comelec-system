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
  electionTitle: {
    fontSize: 24,
    color: COLORS.primary,
    fontWeight: "bold",
  },
  candidate: {
    paddingHorizontal: 16,
    paddingVertical: 10,
    flexDirection: "row",
    justifyContent: "space-between",
    alignItems: "center",
  },
  left: {
    flexDirection: "row",
  },
  right: {
    flexDirection: "row",
  },
  abstain: {
    marginRight: 40,
  },  
  candidateTitle: {
    fontWeight: "bold",
    fontSize: 16,
    marginBottom: 10,
    color: COLORS.primary,
  },
  select: {
    fontWeight: "bold",
    fontSize: 16,
    color: COLORS.grey,
  },
  candidateImg: {
    borderColor: COLORS.primary,
    borderWidth: 1,
    borderRadius: 100,
    minWidth: 40,
    marginRight: 10,
  },
  partyName: {
    color: COLORS.grey,
  },
  input: {
    backgroundColor: COLORS.white,
    borderColor: COLORS.primary,
    borderWidth: 1,
    minHeight: 40,
    minWidth: 40,
    justifyContent: "center",
    alignItems: "center",
    borderRadius: 5,
  },
  actions:{
    marginBottom: 20,
    flexDirection: "row",
    justifyContent: "flex-end",
    alignItems: "center",
  },
  button: {
    paddingHorizontal: 20,
    paddingVertical: 10,
    backgroundColor: COLORS.primary,
    flexDirection: "row",
    justifyContent: "center",
    alignItems: "center",
    borderRadius: 5,
  },
  name: {
    marginRight: 20,
    color: COLORS.white,
  },
  image: {
    maxHeight: 20,
    maxWidth: 30,
  },
});

export default styles;