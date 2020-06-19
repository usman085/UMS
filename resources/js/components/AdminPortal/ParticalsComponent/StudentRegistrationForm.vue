<template>
    <v-container>
        <fieldset class="form-field-sets">
            <legend class="text-center form-field-set-name">Personal Information</legend>
                <v-container>
                    <v-row>
                        <v-col cols="6">
                            <v-text-field label="First Name*"></v-text-field>
                        </v-col>
                        <v-col cols="6">
                            <v-text-field label="Last Name*"></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="6">
                            <v-select :items="items" label="Guardian*" ></v-select>
                        </v-col>
                        <v-col cols="6">
                            <v-menu ref="menu1" v-model="menu1" :close-on-content-click="false" transition="scale-transition"
                            offset-y max-width="290px" min-width="290px" >
                            <template v-slot:activator="{ on, attrs }">
                                <v-text-field  v-model="dateFormatted" label="Birthday*" hint="MM/DD/YYYY" persistent-hint v-bind="attrs"
                                @blur="date = parseDate(dateFormatted)"  v-on="on"></v-text-field>
                            </template>
                            <v-date-picker v-model="date" no-title @input="menu1 = false"></v-date-picker>
                            </v-menu>
                        </v-col>
                    </v-row>
         
                    <v-row>
                        <v-col cols="6">
                            <v-select :items="genders" label="Gender*" ></v-select>
                        </v-col>
                        <v-col cols="6">
                            <v-select :items="bloodGroup" label="Blood Group (optional)" ></v-select>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="6">
                            <v-text-field text-field label="Religion"></v-text-field>
                        </v-col>
                        <v-col cols="6">
                            <v-text-field label="Phone Number*"></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="6" >
                            <v-text-field label="Guardian Phone Number"></v-text-field>
                        </v-col>
                        <v-col cols="6">
                            <v-text-field label="Landline Number"></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="6">
                            <v-text-field label="CNIC NO*"></v-text-field>
                        </v-col>
                        <v-col cols="6">
                                <v-text-field label="Contact Email Account*"></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="6">
                            <v-text-field label="Country*"></v-text-field>
                        </v-col>
                        <v-col cols="6">
                            <v-text-field label="City*"></v-text-field>
                        </v-col>
                    </v-row>

                   

                    <v-row>
                        <v-col cols="12">
                            <v-text-field label="Address*"></v-text-field>
                        </v-col>
                    </v-row>
                <p class="alert-indicate">* indicate that this Fields is Must</p>
                </v-container>
        </fieldset>

        <!-- Personal Info field set  -->
        
        <fieldset class="form-field-sets">
            <legend class="text-center form-field-set-name">Official Information</legend>
            <v-container>
                <v-row>
                    <v-col cols="6">
                        <v-select :items="program" label="Program" ></v-select>
                    </v-col>
                    
                    <v-col cols="6">
                        <v-select :items="TotalSemester" label="No. of Semester in Program " ></v-select>
                    </v-col>
                    
                </v-row>

                <v-row>
                    <v-col cols="6">
                        <v-select :items="semester" label="Semester" ></v-select>
                    </v-col>
                    <v-col cols="6">
                        <v-select :items="shifts" label="Shift" ></v-select>
                    </v-col>
                </v-row>

                <v-row>
                    <v-col cols="6">
                        <v-select :items="sections" label="Section" ></v-select>
                    </v-col>
                    <v-col cols="6">
                        <v-text-field label="Session Years"></v-text-field>
                    </v-col>
                </v-row>

                <v-row>
                    <v-col cols="6">
                        <v-text-field label="Roll Number"></v-text-field>
                    </v-col>
                    <v-col cols="6">
                        <v-text-field label="Registration No."></v-text-field>
                    </v-col>
                </v-row>
            </v-container>

        </fieldset>
        <v-container>
            <p class="fee-addition">Do You want to {{ feeAdd ? 'Modify ' : 'Add' }} Fee Structure Fee Structure? </p>
            <p class="fee-addition"><v-btn color="primary" small @click="dialog =true">{{ feeAdd ? 'Modify ' : 'Add' }} Fee Structure</v-btn></p>
        </v-container>
        <!-- Officail Information  -->
        <fieldset class="form-field-sets">
            <legend class="text-center form-field-set-name">Login Credentials</legend>
                <v-container>
                    <v-row>
                        <v-col cols="12">
                            <v-text-field label="User Name"></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="6">
                            <v-text-field label="Password" type="password" v-model="password"></v-text-field>
                            <password v-model="password" :strength-meter-only="true"/>
                            
                        </v-col>
                        <v-col cols="6">
                            <v-text-field label="Confirm Password" type="password" autocomplete="false"></v-text-field>
                        </v-col>
                        
                    </v-row>
                </v-container>
        </fieldset>
        <!-- Login Information End -->

        <v-container class="text-center">
            <v-btn color="primary" >Register Student</v-btn>
        </v-container>
        






        <!-- Fee Structure Modal -->
         <v-row justify="center">
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click="dialog=false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>Fee Sturcture</v-toolbar-title>
          <v-spacer></v-spacer>
        </v-toolbar>
        <v-container>
            <fieldset class="form-field-sets">
                <legend class="form-field-set-name">Fee Structure Particulars</legend>
                    <v-container>
                        <h3 class="text-center">Complete Package of Semester</h3>
                        <v-divider></v-divider>
                        <v-row>
                            <v-col cols="12">
                                <v-text-field label="Admission Fee"></v-text-field>
                            </v-col>

                            

                            <v-col cols="12">
                                <v-text-field label="Tution Fee Per Semester"></v-text-field>
                            </v-col>

                            <v-col cols="12">
                                <v-text-field label="Scholarship %"></v-text-field>
                            </v-col>

                            <v-col cols="12">
                                <v-text-field label="Amount of Scholarship"></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field label="Fee After  Scholarship"></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field label="Library Fee"></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field label="Exam Fee"></v-text-field>
                            </v-col>

                            <v-col cols="6">
                                <v-text-field label="Sport Fee"></v-text-field>
                            </v-col>
                           
                            <v-col>
                                <h5>Total Amount 45000</h5>
                            </v-col>

                            <v-col>
                                <v-btn color="primary" @click="addFee()">Submit Fee</v-btn>
                            </v-col>
                           
                        </v-row>
                    </v-container>
            </fieldset>
        </v-container>
       
        <v-divider></v-divider>
        

      </v-card>
    </v-dialog>
  </v-row>
  <!-- Add Fee structure -->


    </v-container>
</template>

<script>
 import Password from 'vue-password-strength-meter';
export default {
    name:'StudentRegistratonForm',
    components:{Password},
  data: vm => ({
      dialog:false,
      TotalSemester:['1','2','3','4','5','6','7','8'],
      genders:['Male','female','others'],
      date: new Date().toISOString().substr(0, 10),
      dateFormatted: vm.formatDate(new Date().toISOString().substr(0, 10)),
      menu1: false,
      semester:['1','2','3','4','5','6','7','8'],
      menu2: false,
      shifts:['Morning','Evening'],
      password:'',
      bloodGroup:['N/A','A+','A-','B+','B-','AB-','AB+','O+','O-'],
      items:['Parents','etc'],
      program:['BSCS','BSSE','BSIT'],
      sections:['A','B'],
      feeAdd:false
    }),

    computed: {
      computedDateFormatted () {
        return this.formatDate(this.date)
      },
      feeAdd:function(){
          return this.feeAdd;
      }
    },

    watch: {
      date (val) {
        this.dateFormatted = this.formatDate(this.date)
      },
    },

    methods: {
      addFee:function(){
          this.feeAdd=true;
          this.dialog=!this.dialog;
      },
      formatDate (date) {
        if (!date) return null

        const [year, month, day] = date.split('-')
        return `${month}/${day}/${year}`
      },
      parseDate (date) {
        if (!date) return null

        const [month, day, year] = date.split('/')
        return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`
      },
    },
}
</script>

<style scoped>
.alert-indicate{
    font-size:11px;
    text-align: right;
}
.form-field-sets{
    padding: 10px;
    border-radius: 6px;
    border-color:rgba(0, 0, 0, 0.12);
    margin-bottom: 10px;
}
.form-field-set-name{
    font-weight: bold;
    color:rgba(0, 0, 0, 0.45);
    padding: 0 10px;
}
.fee-addition{
    font-size: 12px;

}
</style>