import { View } from 'react-native'
import { TextInput, Surface, Text, Button } from 'react-native-paper'
import React from 'react'

import { useForm, Controller } from 'react-hook-form'

import { API_URL } from 'react-native-dotenv'
import axios from 'axios';

export default function Register() {
  const { control, handleSubmit, formState: { errors } } = useForm({
    defaultValues: {
      email: '',
      name: '',
      password: '',
    }
  });

  async function onSubmit(data) {
    try {
      await axios.post(
        `${API_URL}/auth/register`,
        data,
      );
    } catch (exception) {
      console.log(exception);
    }
  }

  return (
    <View>
      <Surface>
        <View>
          <Text variant='headlineLarge'>Register</Text>
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
                placeholder='Name'
                onBlur={onBlur}
                onChangeText={onChange}
                value={value}
              />
            )}
            name='name'
          />
          {errors.name && <Text>Name is required</Text>}

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