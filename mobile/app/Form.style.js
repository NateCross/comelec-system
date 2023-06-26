import { StyleSheet } from "react-native";

import { COLORS, SIZES } from "./constants";

const styles = StyleSheet.create({
  container: {
    backgroundColor: COLORS.body,
    minHeight: "100%",
  },
  navbar: {
    marginTop: 30,
    flexDirection: "row",
    justifyContent: "space-between",
    alignItems: "center",
    paddingHorizontal: 25,
    paddingVertical: 25,
    maxHeight: 100,
  },
  appTitle: {
    fontSize: 20,
    color: COLORS.primary,
    fontWeight: "bold",
    flexDirection: "row",
    gap: 20,
  },
  backWrapper: {

  },
  goBack: {
    maxHeight: 22,
    maxWidth: 28,
  },
  main: {
    paddingHorizontal: 25,
    paddingVertical: 10,
    backgroundColor: COLORS.body,
    flex: 1,
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
    minWidth: 20,
    maxWidth: 20,
    minHeight: 20,
    maxHeight: 20,
  },
  leftTitle: {
    color: COLORS.primary,
  },
  rightTitle: {
    color: COLORS.grey,
  },
  title: {
    fontSize: 56,
    fontWeight: 'bold',
    color: COLORS.primary,
  },
  description: {
    fontSize: 16,
    color: COLORS.grey,
  },
  fields: {
    flexDirection: 'column',
  },
  field: {
    marginTop: 5,
    flexDirection: 'column',
  },
  name: {
    marginBottom: 5,
  },
  input: {
    borderWidth: 1,
    color: COLORS.grey,
    borderColor: COLORS.grey,
    backgroundColor: COLORS.white,
  },
  actions: {
    flexDirection: 'column',
    alignItems: 'center',
  },
  button: {
    backgroundColor: COLORS.primary,
    alignItems: 'center',
    minWidth: '100%',
    borderRadius: 2,
    paddingHorizontal: 30,
    paddingVertical: 15,
    marginBottom: 15,
  },
  actionText: {
    color: COLORS.white,
    fontWeight: "bold",
  },
  redirect: {
    flexDirection: 'row',
    alignItems: 'center',
  },
  redirectText: {
    marginRight: 5,
  },
  redirectLink: {
    fontWeight: 'bold',
    color: COLORS.primary,
  },
});

export default styles;