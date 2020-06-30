<template>
    <div>
      <v-row justify="center">
        <v-dialog v-model="TimeTableDetailModal" persistent max-width="500px">
          <v-card max-width="100%">
                    <v-card-title class="title font-weight-regular justify-space-between">
                    <span>Create Time Table</span>
                    <v-avatar color="primary lighten-2" class="subheading white--text" size="24" v-text="step"></v-avatar>
                    </v-card-title>

            <v-window v-model="step">
                    <v-window-item :value="1">
                        <v-card-text>
                        <v-select :items="program" v-model="scheduleHead.program" label="Select Program"></v-select>

                        <v-select :items="semester" v-model="scheduleHead.semester" label="Select Semester"></v-select>
                       
                        </v-card-text>
                    </v-window-item>

                <v-window-item :value="2">
                    <v-card-text>
                            <v-select :items="shift" v-model="scheduleHead.shift" label="Select Shift"></v-select>
                            <span class="caption grey--text">Section is not Must But If You 
                              Divide you classes in section wise then it is required
                            </span>
                            <v-select :items="section" v-model="scheduleHead.section" label="Select Section"></v-select>
                                
                    </v-card-text>
                </v-window-item>

                <v-window-item :value="3">
                  <div class="pa-4 text-center">
                  
                    <h3 class="title font-weight-light mb-2">Done!</h3>
                    <span class="caption grey--text">This Parameters Are same For all enter schedules</span>
                    <span class="caption grey--text">Thanks for Setting require Parameter</span>
                  </div>
                </v-window-item>
            </v-window>

            <v-divider></v-divider>

            <v-card-actions>
              <v-btn :disabled="step === 1" text  @click="step--">Back</v-btn>
              <v-spacer></v-spacer>

              <v-btn  :disabled="step === 3"  color="primary"  depressed  @click="step++"  v-if="step < 3">Next</v-btn>

              <v-btn color="primary"  v-if="step == 3" @click="AddTimeTableModel()">
                Create Schedule Now!
              </v-btn>

            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-row>
    </div>
</template>

<script>
import EventBus from '../../../EventBus/eventBus';
export default {
    name:'timeTableDetail',
    data:function(){
        return{
            step:1,
            program:['BSSE','BSIT'],
            semester:['1','2','3','4','5'],
             shift:['Morning','Evening'],
            section:['A','B'],
            scheduleHead:{
              program:'',
              semester:'',
              shift:'',
              section:'',
            }
        }
    },
    methods:{
        AddTimeTableModel(){
          EventBus.$emit('timeTableDetail',this.scheduleHead);
          this.$store.dispatch('TimeTableDetailModal');
          this.$store.dispatch('CreateTimeTableModal');
       },
    },
    computed:{
          TimeTableDetailModal:function(){
         return this.$store.state.TimeTableDetailModal;
       },
    }
}
</script>