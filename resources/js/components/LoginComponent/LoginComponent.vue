<template>

  <v-app id="inspire">
    <v-content>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
          >
            <v-card class="elevation-12">
              <v-toolbar
                color="primary"
                dark
                flat
                
              >
                <v-toolbar-title >Login TO UMS</v-toolbar-title>
                <v-spacer></v-spacer>
                
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field
                    label="Login"
                    name="login"
                    prepend-icon="mdi-account"
                    v-model="email"
                    type="text"
                  ></v-text-field>

                  <v-text-field
                    id="password"
                    label="Password"
                    name="password"
                    v-model="password"
                    prepend-icon="mdi-lock"
                    type="password"
                  ></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn  @click="loginValidate()">Login</v-btn>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>


<script>
import  cryptoJSON from 'crypto-json';
export default {
    name : "login",
    data(){
      return{
        email:'',
        password:'',
        test:{
          name:'usman'
        }
    }},
    methods:{
      loginValidate:function(){
        if(this.email=='admin' && this.password=='admin'){

          adminUser={'email':this.email,'password':this.password};

          let adminUser=cryptoJSON.encrypt(adminUser,'orbit');
          localStorage.setItem('adminLogin',adminUser);
          
          // var d=cryptoJSON.decrypt(adminUser,'orbit');
          
          this.$router.push({ name: 'adminPortal'});

        }
        if(this.email=='student' && this.password=='student'){
          localStorage.setItem('studentLogin','student');
          this.$router.push('/student-portal/dash-board');
        }

      }
    }
}
</script>

<style scoped>
</style>
