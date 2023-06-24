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
  menuButton: {
    marginLeft: 10,
    padding: 8,
    borderColor: COLORS.secondary,
    borderWidth: 1,
    borderRadius: 2,
    maxWidth: 40,
    maxHeight: 40,
  },
  devToggle: {
    padding: 8,
    borderColor: COLORS.primary,
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
  groupLink: {
    flexDirection: "row",
    justifyContent: "space-evenly",
  },
  group: {
    marginBottom: 10,
  },
  header: {
    flexDirection: 'row',
    alignItems: 'center',
  },
  latest: {
    fontSize: 30,
    fontWeight: 'bold',
    color: COLORS.primary,
  },
  announcement: {
    fontSize: 30,
    fontWeight: 'bold',
    color: COLORS.primary,
  },
  hr: {
    marginTop: 5,
    marginLeft: 5,
    marginRight: 5,
    minWidth: 30,
    height: 2,
    backgroundColor: COLORS.black,
  },
  hornImage: {
    transform: [{ rotate: '-25deg'}],
    maxHeight: 30,
    maxWidth: 30,
  },
  articleText: {
    fontSize: 16,
    textAlign: 'justify',
  },
});

export default styles;