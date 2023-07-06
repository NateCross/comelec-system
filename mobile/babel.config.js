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
    plugins: [
      require.resolve("expo-router/babel"),
      [
        "module:react-native-dotenv",
        {
          moduleName: 'react-native-dotenv',
          verbose: false,
        },
      ],
      [
        'transform-inline-environment-variables',
        {
          "exclude": [
            "EXPO_ROUTER_APP_ROOT",
            "EXPO_ROUTER_PROJECT_ROOT",
            "EXPO_ROUTER_IMPORT_MODE",
            "EXPO_ROUTER_IMPORT_MODE_ANDROID",
            "EXPO_ROUTER_IMPORT_MODE_IOS",
            "EXPO_ROUTER_IMPORT_MODE_WEB",
          ],
        },
      ],
    ],
  };
};
