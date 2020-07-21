<template>
  <div class="create-time-table-wrapper">
    <v-card>
      <v-card-title class="text-center time-header">
        <b class="tmeTableHead">Add Exam Routine</b>
      </v-card-title>
      <!--Change  Card Sub title On Inserted Object -->
      <v-card-subtitle>
        <span v-if="!scheduleHead.program == ''">Program : {{ scheduleHead.program | capitalize }}</span>
        <span v-if="!scheduleHead.semester == ''">
          <v-icon>mdi-chevron-double-right</v-icon>
          Semester : {{scheduleHead.semester | numberToNth}}
        </span>
        <span v-if="!scheduleHead.shift == ''">
          <v-icon>mdi-chevron-double-right</v-icon>
          Shift : {{scheduleHead.shift | capitalize}}
        </span>
        <!-- Edit Icon Base on condition -->
        <span v-if="!scheduleHead.program == '' && !$store.state.TimeTableDetailModal">
        <!-- Open Add Exam Model To Edit Details -->
          <v-icon @click.stop="$store.dispatch('AddExamModalToggle')">mdi-pencil</v-icon>
        </span>
      </v-card-subtitle>
    </v-card>

    <!-- Conditional Rendering  -->
    <div v-if="insertExamData.length > 0">
      <div class="add-more">
        <v-btn @click="$store.dispatch('AddExamRoutineModalToggle')">Add More Class Routine</v-btn>
      </div>
      <v-simple-table class="mt-5 elevation-2">
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-center headline">Day</th>
              <th class="text-center headline">Date</th>
              <th class="text-center headline">Start Time</th>
              <th class="text-center headline">End Time</th>
              <th class="text-center headline">Subject</th>
              <th class="text-center headline">Room</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, index) in insertExamData" :key="index">
              <td class="text-center title">{{ item.day }}</td>
              <td class="text-center title">{{ item.date }}</td>
              <td class="text-center title">{{ item.startingtime }}</td>
              <td class="text-center title">{{ item.endingTime }}</td>
              <td class="text-center title">{{ item.subject }}</td>
              <td class="text-center title">
                {{ item.classRoom }}
                <span class="action-icons">
                  <v-icon @click="editData(index)">mdi-pencil</v-icon>
                  <v-icon @click="deleteItem(index)">mdi-delete</v-icon>
                </span>
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>

      <div>
        <v-btn class="text-center save-btn" color="primary">Save Time Table</v-btn>
      </div>
    </div>
    <div class="addition-card text-center" v-else>
    <!-- Open Model To Edit Exam Routin -->
      <v-icon class="add-table" @click.stop="$store.dispatch('AddExamModalToggle')">mdi-table-edit</v-icon>
    </div>
    <!-- Conditional Rendering  -->
    <AddExamModal></AddExamModal>

    <AddExamRoutineModal :editData="EditExamData" :updateBtn="updateBtn"></AddExamRoutineModal>
    <!-- Icon table Add -->
  </div>
</template>

<script>
// *** Import Model From Partial Components
import AddExamModal from "../PartialComponents/AddExamModal";

// *** Event Bus Use to Communicate Data Between Two Components
import EventBus from "../../../EventBus/eventBus";

// *** Import Model From Partial Components
import AddExamRoutineModal from "../PartialComponents/AddExamRoutineModal";

export default {
  name: "AddExamRoutine",
  components: {
    AddExamModal,
    AddExamRoutineModal
  },
  data: function() {
    return {
      updateBtn: false,
      insertExamData: [],
      scheduleHead: {
        program: "",
        semester: "",
        shift: ""
      },
      EditExamData: {
        id: "",
        day: "",
        date: "",
        subject: "",
        startingtime: "",
        endingTime: "",
        classRoom: ""
      }
    };
  },
  methods: {
    // Open The Model To Add Data
    AddExamModalToggle: function() {
      
      this.$store.dispatch("AddExamModalToggle");
    },
    // Edit Data Function Is use to Edit Row Data
    editData(index) {
      this.EditExamData = this.insertExamData[index];
      this.updateBtn = true;
      this.$store.dispatch("AddExamRoutineModalToggle");
    },
    
    // Delete item Function Delete The Desired Row
    deleteItem(index) {
      this.insertExamData.splice(index, 1);
    
    },
    
    // randStr function Is Use To Generate Random String For Id 
    randStr(len) {
      let text = "";
      let chars = "abcdefghijklmnopqrstuvwxyz";
      for (let i = 0; i < len; i++) {
        text += chars.charAt(Math.floor(Math.random() * chars.length));
      }
      return text + new Date().getTime();
    }
  },
  mounted() {
    
    // Listen The data Recieve From  insertExamData To insert Data
    EventBus.$on("insertExamData", data => {
      let id = this.randStr(6); //Genrate Random String
      // *** Push in array
      this.insertExamData.push({
        id: id,
        subject: data.subject,
        classRoom: data.classRoom,
        day: data.day,
        date: data.date,
        startingtime: data.startingtime,
        endingTime: data.endingTime
      });
    });

    // Listen The data Recieve From  updateExamData To update Data
    EventBus.$on("updateExamData", data => {
      this.insertExamData.filter(item => {
        this.updateBtn = false;
        if (item.id == data.id) {
          item.day = data.day;
          item.date = data.date;
          item.classRoom = data.classRoom;
          item.startingtime = data.startingtime;
          item.endingTime = data.endingTime;
          item.subject = data.subject;
        }
      });
    });
    
    // *** Add Time Table Detail in array
    EventBus.$on("ExamRoutineDetail", data => {
      this.scheduleHead.program = data.program;
      this.scheduleHead.semester = data.semester;
      this.scheduleHead.shift = data.shift;
    });
  }
};
</script>

<style scoped>
.add-table {
  font-size: 215px;
  transform: translateY(50%);
}

.theme--light.v-data-table tbody tr td {
  border: thin solid rgba(0, 0, 0, 0.12);
}

.theme--light.v-data-table thead tr:last-child th {
  border: thin solid rgba(0, 0, 0, 0.12);
}

.v-data-table td {
  height: 50px;
}

.class-name {
  float: left !important;
}

.class-time {
  float: right !important;
  font-size: 15px;
}

.day {
  font-size: 18px;
  font-weight: bold;
}

.teacher-name {
  font-size: 18px;
  display: table;
  margin: 0 auto;
}

.subject-name {
  text-align: left;
}

.time-header {
  display: table;
  margin: 0 auto;
}

.add-more {
  text-align: end;
  padding: 15px;
}

.tmeTableHead {
  padding: 15px 0;
}

.action-icons {
  float: right;
}
</style>
