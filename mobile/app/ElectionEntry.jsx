import { useEffect, useState } from "react";
import { Link, Stack, useLocalSearchParams } from "expo-router";
import { Text, View, TouchableOpacity, Image } from "react-native";
import { images, icons } from "./constants";
import { useAuth } from "./constants/useAuth";
const API_URL = process.env.API_URL;;
import styles from "./ElectionEntry.style";
import formStyles from "./Form.style";
import axios from "axios";
import { Controller, useForm } from "react-hook-form";
import { TextInput } from "react-native-paper";
import { useRouter } from "expo-router";
import Header from "./constants/Header";

export default function electionEntry() {
  const { user } = useAuth();
  const router = useRouter();
  const params = useLocalSearchParams();

  const [activeElection, setActiveElection]
    = useState({
      name: 'Loading...',
    });
  const [error, setError] = useState(null);

  const { control, handleSubmit, formState: { errors } } =
    useForm({
      defaultValues: {
        access_code: params?.code || '',
      }
    });
  
  // Run on first load
  useEffect(() => {
    axios.get(
      `${API_URL}/api/election`
    ).then((result) => {
      console.log(result?.data);
      setActiveElection(result?.data)

      if (!result?.data?.id) {
        router.replace('/ElectionDeny');
      }
    }).catch((error) => {
      console.log(error);
    });
  }, []);

  async function onSubmit(data) {
    setError(null);
    try {
      const response = await axios.post(
        `${API_URL}/api/election/code`,
        { 
          ...data, 
          election_id: activeElection?.id,
        },
      );
      router.push({
        pathname: 'Voting',
      })
    } catch (exception) {
      setError(exception?.response?.data?.error);
    }
  }

  return (
    <View style={styles.container}>
      <Header />
      <View style={styles.main}>
        <View style={styles.accessDetails}>
          <Image
            source={images.election}
            style={styles.image}
          />
          <View style={styles.electionDetails}>
            <Text style={styles.title}>
              {activeElection?.name}
            </Text>
            <Text style={styles.description}>The election period is ongoing.</Text>
          </View>
          <View style={styles.accessCode}>
            <Text style={styles.name}>Verify Access Code</Text>
            {error && 
              <Text>{error}</Text>
            }
            <View style={styles.codes}>
              <Controller
                style={formStyles.inputBox}
                control={control}
                rules={{
                  required: true,
                  minLength: 1,
                }}
                render={({ field: { onChange, onBlur, value } }) => (
                  <TextInput
                    style={formStyles.input}
                    onBlur={onBlur}
                    onChangeText={onChange}
                    value={value}
                    maxLength={6}
                  />
                )}
                name='access_code'
              />
              {errors?.access_code && <Text>Access Code is required</Text>}
              {/* <View style={styles.code}></View>
              <View style={styles.code}></View>
              <View style={styles.code}></View>
              <View style={styles.code}></View>
              <View style={styles.code}></View>
              <View style={styles.code}></View> */}
            </View>
            <View style={styles.option}>
              <Text style={styles.optionText}>or</Text>
            </View>
          </View>
          <Link style={styles.qrButton} href="/ScanQR">
            <View style={styles.buttonWrapper}>
              <Image
                source={icons.qr}
                style={styles.qrImage}
              />
              <Text style={styles.qrText}>QR Scan</Text>
            </View>
          </Link>
        </View>
        <View style={styles.actions}>
          <View style={styles.noCode}>
            <Text style={styles.default}>Don't have a code?</Text>
            <View style={styles.group}>
              <Text style={styles.default}>Approach a</Text>
              <Text style={styles.highlight}>Poll Worker</Text>
            </View>
          </View>
          <TouchableOpacity 
            style={styles.primaryButton}
            onPress={handleSubmit(onSubmit)}
          >
            <Text style={formStyles.actionText}>Enter Access Code</Text>
            {/* <Link href="" style={styles.accessText}>Enter Access Code</Link> */}
          </TouchableOpacity>
          <Link style={styles.secondaryButton} href="/">
            <TouchableOpacity>
              <Text style={styles.primaryText}>Return to Announcement</Text>
            </TouchableOpacity>
          </Link>
        </View>
      </View>
    </View>
  );
}