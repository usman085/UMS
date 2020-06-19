<template>
  <v-simple-table class="mt-5 elevation-2">
    <template>
      <thead>
        <tr>
          <th colspan="4">Class Routine Day By Day</th>
        </tr>
      </thead>
      <tbody>
        <template v-for="(item,index) in items">
        <tr :key="item.id">
          <template v-if="item.day=='monday' && index == 0">
              <td class="day">{{ item.day | capitalize }}</td>
                <td v-for="(timeTable,index) in mondaySchdule" :key="index" >

                  <span class="class-room">{{ timeTable.classRoom | capitalize  }}</span>
                  <span class="class-time">{{ timeTable.time | capitalize  }}</span>
                  <br>
                 <span class="teacher-name text-center">{{ timeTable.teacher | capitalize  }}<br></span>
                  <span class="subject-name">({{ timeTable.subject | capitalize  }})</span>


                </td>
          </template>
        </tr>

         <tr :key="item.id">
          <template v-if="item.day=='tuesday' && index == 1">
              <td class="day">{{ item.day | capitalize }}</td>
                <td v-for="(timeTable,index) in tuesdaySchdule" :key="index" >

                  <span class="class-room">{{ timeTable.classRoom | capitalize  }}</span>
                  <span class="class-time">{{ timeTable.time | capitalize  }}</span>
                  <br>
                 <span class="teacher-name text-center">{{ timeTable.teacher | capitalize  }}<br></span>
                  <span class="subject-name">({{ timeTable.subject | capitalize  }})</span>


                </td>
          </template>
        </tr>


         </template>



      </tbody>
    </template>
  </v-simple-table>
</template>
<script>
export default {
  name: "ClassRoutineBlock",

  data() {
    return {
      items: [
        {
          day:'monday',
          teacher:'usman',
          subject:'English',
          time:'9:00-10:00',
          classRoom:'cr3'
        },
        {
          day:'tuesday',
          teacher:'test1',

        }
        , {
          day:'Wednesday',
          teacher:'test3',

        },
         {
          day:'monday',
          teacher:'usman',
        },
        {
          day:'monday',
          teacher:'test1',

        }
        , {
          day:'friday',
          teacher:'test3',

        }

      ]
    };
  },
  computed:{
    mondaySchdule:function(){
      return this.items.filter(data=>data.day == 'monday');
    },
    tuesdaySchdule:function(){
       return this.items.filter(data=>data.day == 'tuesday');
    }
  },
};
</script>
<style  scoped>
.theme--light.v-data-table tbody tr td {
  border: thin solid rgba(0, 0, 0, 0.12);
}
.theme--light.v-data-table thead tr:last-child th {
  border: thin solid rgba(0, 0, 0, 0.12);
}
.v-data-table td {
  height: 50px;
}
.class-name{
  float: left !important;
}
.class-time{
  float: right !important;
  font-size: 15px;
}
.day{
  font-size: 18px;
}
.teacher-name{
  font-size: 18px;
  display: table;
  margin: 0 auto;
}
.subject-name{
  text-align: left;
}
</style>
