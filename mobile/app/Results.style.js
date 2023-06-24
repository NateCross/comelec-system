import { StyleSheet } from "react-native";
import { COLORS, SIZES } from "./constants";

const styles = StyleSheet.create({
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
  title: {
    fontSize: 24,
    fontWeight: "bold",
    color: COLORS.primary,
  },
  cards: {
    marginTop: 20,
    flexDirection: "row",
    justifyContent: "space-between",
    alignItems: "center",
    minWidth: "100%",
  },
  card: {
    backgroundColor: COLORS.primary,
    maxHeight: 100,
    minHeight: 100,
    minWidth: 170,
    maxWidth: 170,
    paddingHorizontal: 16,
    paddingVertical: 10,
    borderRadius: 10,
  },
  group: {
    flex: 1,
    justifyContent: "space-between",
    alignItems: "flex-start",
    flexDirection: "row",
  },
  value: {
    fontSize: 18,
    fontWeight: "bold",
    color: COLORS.white,
  },
  name: {
    color: COLORS.white,
    fontWeight: "bold",
  },
  votingIcon: {
    marginTop: 2,
    maxWidth: 25,
    maxHeight: 25,
  },
  markIcon: {
    marginTop: 2,
    maxWidth: 18,
    maxHeight: 30,
  },
  position: {
    marginTop: 20,
  },
  posName: {
    color: COLORS.grey,
    fontSize: 16,
    fontWeight: "bold",
  },
  posValue: {
    color: COLORS.primary,
    fontSize: 16,
    fontWeight: "bold",
  },
  candidate: {
    marginTop: 3,
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
  candidateTitle: {
    fontWeight: "bold",
    fontSize: 16,
    marginBottom: 10,
    color: COLORS.primary,
  },
  candidateName: {
    fontWeight: "bold",
    color: COLORS.primary,
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
  count: {
    marginTop: 2,
    marginRight: 10,
    fontWeight: "bold",
    color: COLORS.primary
  },
  percentage: {
    backgroundColor: COLORS.primary,
    minHeight: 40,
    minWidth: 40,
    alignItems: "center",
    justifyContent: "center",
    borderRadius: 2,
  },
  percentageText: {
    fontWeight: "bold",
    color: COLORS.white,
  },
  candidateNav: {
    flexDirection: "row",
    alignItems: "center",
    justifyContent: "center",
  },
  active: {
    marginRight: 10,
    height: 10,
    width: 10,
    backgroundColor: COLORS.black,
    borderRadius: 100,
  },
  inactive: {
    marginRight: 10,
    height: 10,
    width: 10,
    backgroundColor: COLORS.grey,
    borderRadius: 100,
  }
});

export default styles;
