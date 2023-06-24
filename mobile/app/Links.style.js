import { StyleSheet } from "react-native";

import { COLORS, SIZES } from "./constants";

const styles = StyleSheet.create({
  container: {
    minHeight: '100%',
    backgroundColor: COLORS.bg,
    alignItems: "center",
    justifyContent: "center",
    color: COLORS.black,
  },
  links: {
    
  },
  link: {
    marginTop: 10,
    backgroundColor: COLORS.primary,
    color: COLORS.white,
    fontSize: 25,
    paddingHorizontal: 16,
    paddingVertical: 10,
  },
});

export default styles;