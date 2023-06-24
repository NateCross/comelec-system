import { StyleSheet } from "react-native";

import { COLORS, SIZES } from "./constants";

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: COLORS.body,
    justifyContent: 'space-between',
    paddingHorizontal: 30,
    paddingVertical: 10,
    minHeight: '100%',
  },
  header: {
  },
  title: {
    fontSize: 48,
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
    paddingVertical: 10,
    marginBottom: 15,
  },
  actionText: {
    color: COLORS.white,
  },
  redirect: {
    flexDirection: 'row',
    alignItems: 'center',
  },
  redirectText: {
    marginRight: 5,
  },
  link: {
    fontWeight: 'bold',
  },
});

export default styles;