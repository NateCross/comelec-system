import { StyleSheet } from "react-native";

import { COLORS, SIZES } from "./constants";

const styles =StyleSheet.create ({
  container: {
    backgroundColor: '#fff',
  },
  nav: {
    minHeight: '100%',
  },
  link: {
    flex: 1,
    flexDirection: 'row',
    maxHeight: 65,
    paddingHorizontal: 16,
    paddingVertical: 16,
    alignItems: 'center',
    justifyContent: 'space-between',
    borderColor: COLORS.white,
    borderBottomColor: COLORS.border,
    borderWidth: 2,
  },
  left: {
    flex: 1,
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'center',
  },
  hornImage: {
    transform: [{ rotate: '-25deg'}],
    maxHeight: 20,
    maxWidth: 20,
  },
  leftIcon: {
    maxHeight: 20,
    maxWidth: 20,
  },
  right: {
    flex: 1,
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'flex-end',
  },
  rightIcon: {
    maxHeight: 25,
    maxWidth: 25,
  },
  name: {
    marginLeft: 20,
    fontSize: 18,
    fontWeight: 'bold',
    color: COLORS.primary,
  },  
  message: {
    marginTop: 30,
    paddingHorizontal: 16,
    fontSize: 22,
  }
});

export default styles;