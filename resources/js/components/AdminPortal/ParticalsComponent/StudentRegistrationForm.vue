<template>
     <v-container>
         <v-row>
             <v-col cols="6">
                 <v-text-field label="First Name"></v-text-field>
             </v-col>
             <v-col cols="6">
                 <v-text-field label="Last Name"></v-text-field>
             </v-col>
         </v-row>
         

          <v-row>
             <v-col cols="6">
                 <v-select :items="items" label="Guardian" ></v-select>
             </v-col>
             <v-col cols="6">
                            <v-menu ref="menu1" v-model="menu1" :close-on-content-click="false" transition="scale-transition"
                        offset-y max-width="290px" min-width="290px" >
                <template v-slot:activator="{ on, attrs }">
                    <v-text-field  v-model="dateFormatted" label="Birthday" hint="MM/DD/YYYY" persistent-hint v-bind="attrs"
                            @blur="date = parseDate(dateFormatted)"  v-on="on"></v-text-field>
                </template>
                <v-date-picker v-model="date" no-title @input="menu1 = false"></v-date-picker>
                </v-menu>
        
             </v-col>
         </v-row>


          <v-row>
             <v-col cols="6">
                 <v-select :items="genders" label="Gender" ></v-select>
             </v-col>
             <v-col cols="6">
                  <v-select :items="bloodGroup" label="Blood Group (optional)" ></v-select>
             </v-col>
         </v-row>

         <v-row>
             <v-col cols="6">
                 <v-text-field label="Religion"></v-text-field>
             </v-col>
             <v-col cols="6">
                 <v-text-field label="Phone Number"></v-text-field>
             </v-col>
         </v-row>
         

             <v-row>
             <v-col cols="6">
                 <v-text-field label="Home Phone Number"></v-text-field>
             </v-col>
              <v-col cols="6">
                  <v-text-field label="CNIC NO"></v-text-field>
             </v-col>
         </v-row>
          <v-row>
             <v-col cols="12">
                 <v-text-field label="Address"></v-text-field>
             </v-col>
         </v-row>

         <v-row>
              <v-col cols="6">
                 <v-text-field label="State"></v-text-field>
             </v-col>
             <v-col cols="6">
                 <v-text-field label="Country"></v-text-field>
             </v-col>
         </v-row>

            <v-row>
              <v-col cols="6">
                   <v-select :items="program" label="Program & Class" ></v-select>
             </v-col>
             <v-col cols="6">
                  <v-select :items="semester" label="Semester" ></v-select>
             </v-col>
         </v-row>

          <v-row>
               <v-col cols="6">
                 <v-text-field label="Landline Number"></v-text-field>
             </v-col>
             <v-col cols="6">
                  <v-text-field label="Contact Email Account"></v-text-field>
             </v-col>
         </v-row>

          <v-row>
              <v-col cols="6">
                  <v-text-field label="Session Years"></v-text-field>
             </v-col>
             <v-col cols="6">
                  <v-text-field label=""></v-text-field>
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
</template>

<script>
export default {
    name:'StudentRegistratonForm',
  data: vm => ({
      genders:['Male','female','others'],
      date: new Date().toISOString().substr(0, 10),
     // dateFormatted: vm.formatDate(new Date().toISOString().substr(0, 10)),
      menu1: false,
      semester:['I','II','III','IV','V','VI'],
      menu2: false,
      bloodGroup:['N/A','A+','A-','B+','B-','AB-','AB+','O+','O-'],
      items:['Parents','etc'],
      program:['BSCS','BSSE','BSIT']
    }),

    computed: {
      computedDateFormatted () {
        return this.formatDate(this.date)
      },
    },

    watch: {
      date (val) {
        this.dateFormatted = this.formatDate(this.date)
      },
    },

    methods: {
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