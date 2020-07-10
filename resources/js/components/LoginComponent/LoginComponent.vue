<template>
<v-app id="inspire">
   
    <v-content>
        <v-container class="fill-height" fluid>
            <v-row align="center" justify="center">
                <v-col cols="12" sm="8" md="4">
                    <v-card class="elevation-12">
                        <v-toolbar color="primary" dark flat>
                            <v-toolbar-title>Login TO UMS</v-toolbar-title>
                            <v-spacer></v-spacer>

                        </v-toolbar>

                        <v-card-text>

                            <v-form ref="form" v-model="valid">
                                <v-text-field :rules="emailRules" label="Email" required prepend-icon="mdi-account" v-model="email" type="text"></v-text-field>
                                <v-text-field label="Password" :rules="PasswordRules" v-model="password" prepend-icon="mdi-lock" type="password"></v-text-field>
                            </v-form>
                        </v-card-text>
                        <v-card-actions>
                            <span class="text-center error-message">{{error}}</span>
                            <v-spacer></v-spacer>
                            <v-btn @click="loginValidate()" :disabled="!valid">Login</v-btn>
                        </v-card-actions>

                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-content>
    <pacer :message="'Authenticating.....'"></pacer>
</v-app>
</template>

<script>
import pacer from '../CommonGobalComponent/Pacer';
export default {
    name: "login",
    components:{pacer},
    data() {
        return {
            routeMessage:'',
            valid: true,
            emailRules: [
                v => !!v || 'E-mail is required',
                v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
            ],
            PasswordRules: [
                v => !!v || 'Password is required'
            ],
            email: '',
            overlay: false,
            error: '',
            password: '',
        }
    },
    methods: {
        loginValidate: function () {
            this.$store.dispatch('overlay');
            axios.post(process.env.MIX_APP_URL + '/login', {
                    'email': this.email,
                    'password': this.password
                })
                .then((res) => {
                    let userAuth = {
                        'token': res.data.success.token,
                        'user_name': res.data.success.user.name,
                        'user_role': res.data.success.user.role,
                        'user_email': res.data.success.user.email,
                    }
                    let cryptAuth = JSON.stringify(cryptoJSON.encrypt(userAuth, 'ums'))

                    if (res.data.success.user.role == '5') {
                         this.$store.dispatch('overlay');
                        localStorage.setItem('adminLogin', cryptAuth);
                        this.$router.push({
                            name: 'AdminDashboard'
                        });

                    }
                     
                })
                .catch((err) => {
                    this.error = "User Does Not Exist";
                    this.$store.dispatch('overlay');
                });

        }
    }
}
</script>

<style scoped>
.error-message {
    text-align: center;
    color: #ff5252 !important;
}
</style>
