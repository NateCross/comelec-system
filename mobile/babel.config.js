module.exports = function(api) {
  api.cache(true);
  return {
    presets: ['babel-preset-expo'],

    // Added to support react-native-paper
    // https://callstack.github.io/react-native-paper/docs/guides/getting-started/
    env: {
      production: {
        plugins: ['react-native-paper/babel'],
      },
    },

    // Added to support expo-router
    // https://expo.github.io/router/docs
    plugins: [require.resolve("expo-router/babel")],
  };
};
