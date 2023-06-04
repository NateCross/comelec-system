import { View } from 'react-native'
import { TextInput, Surface, Text, Button } from 'react-native-paper'
import React from 'react'
import { useRouter } from 'expo-router'

import { API_URL } from 'react-native-dotenv'

import { useForm, Controller } from 'react-hook-form'
import { Checkbox } from 'react-native-paper';
import { useSanctum } from 'react-sanctum';
import axios from 'axios'
import { deviceName } from 'expo-device'

export default function Login() {
  const { control, handleSubmit, formState: { errors } } = useForm({
    defaultValues: {
      email: '',
      password: '',
      remember: false,
    }
  });
  const { setUser } = useSanctum();
  const router = useRouter();

  /**
   * Submits login form to the API.
   * 
   * The signIn method provided by the useSanctum() hook
   * does not seem to work on mobile with the server.
   * As such, we instead manually get the auth token 
   * first to authenticate the user and use that in an 
   * authorization header to get the user itself.
   * 
   * Then, we redirect back to the home page.
   * @param {*} data Form data
   */
  async function onSubmit(data) {
    try {
      const { data: token } = await axios.post(
        `${API_URL}/auth/token`,
        { ...data, device_name: deviceName },
      );

      const { data: user } = await axios.get(
        `${API_URL}/user`,
        {
          headers: {
            'Authorization': `Bearer ${token}`,
          },
        }
      )

      setUser(user, true);

      router.replace("/");
    } catch (exception) {
      console.log(exception);
    }
  }

  return (
    <View>
      <Surface>
        <View>
          <Text variant='headlineLarge'>Login</Text>
        </View>
        <View>
          <Controller
            control={control}
            rules={{
              required: true,
            }}
            render={({ field: { onChange, onBlur, value } }) => (
              <TextInput
                placeholder='Email'
                onBlur={onBlur}
                onChangeText={onChange}
                value={value}
              />
            )}
            name='email'
          />
          {errors.email && <Text>Email is required</Text>}

          <Controller
            control={control}
            rules={{
              required: true,
            }}
            render={({ field: { onChange, onBlur, value } }) => (
              <TextInput
                placeholder='Password'
                onBlur={onBlur}
                onChangeText={onChange}
                value={value}
                secureTextEntry
              />
            )}
            name='password'
          />
          {errors.password && <Text>Password is required</Text>}

          <Controller
            control={control}
            rules={{
              required: false,
            }}
            render={({ field: { onChange, value } }) => (
              <View>
                <Text>Remember Me</Text>
                <Checkbox
                  onPress={() => {onChange(!value)}}
                  status={value ? 'checked' : 'unchecked'}
                />
              </View>
            )}
            name='remember'
          />

          <Button
            icon='arrow-right-bottom'
            onPress={handleSubmit(onSubmit)}
          >
            Submit
          </Button>
        </View>
      </Surface>
    </View>
  )
}