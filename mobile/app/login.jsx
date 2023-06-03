import { View } from 'react-native'
import { TextInput, Surface, Text, Button } from 'react-native-paper'
import React from 'react'
import { Redirect, useRouter, useFocusEffect } from 'expo-router'

import { useForm, Controller } from 'react-hook-form'
import { Checkbox } from 'react-native-paper';
import { useSanctum } from 'react-sanctum';

export default function Login() {
  const { control, handleSubmit, formState: { errors } } = useForm({
    defaultValues: {
      email: '',
      password: '',
      remember: true,
    }
  });
  const { signIn } = useSanctum();
  const router = useRouter();

  async function onSubmit(data) {
    try {
      const res = await signIn(
        data.email,
        data.password,
        data.remember,
      );
      console.log(res);

      router.replace("/");

      // await axios.post(
      //   `${API_URL}/auth/login`,
      //   data,
      // );
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