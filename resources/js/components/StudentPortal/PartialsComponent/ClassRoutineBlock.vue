<template>
  <v-simple-table class="mt-5 elevation-2">
    <template>
      <thead>
        <tr>
          <th colspan="4">Class Routine Day By Day</th>
        </tr>
      </thead>
      <tbody>
        
          
        <tr>
              <td class="day">Monday</td>

                <td v-for="(timeTable,index) in mondaySchdule" :key="index" >

                  <span class="class-room">{{ timeTable.classRoom | capitalize  }}</span>
                  <span class="class-time">{{ timeTable.time | capitalize  }}</span>
                  <br>
                 <span class="teacher-name text-center">{{ timeTable.teacher | capitalize  }}<br></span>
                  <span class="subject-name">({{ timeTable.subject | capitalize  }})</span>
                   
                    
                </td>  
          
        </tr> 

        <tr>
              <td class="day">Tuesday</td>

                <td v-for="(timeTable,index) in tuesdaySchdule" :key="index" >

                  <span class="class-room">{{ timeTable.classRoom | capitalize  }}</span>
                  <span class="class-time">{{ timeTable.time | capitalize  }}</span>
                  <br>
                 <span class="teacher-name text-center">{{ timeTable.teacher | capitalize  }}<br></span>
                  <span class="subject-name">({{ timeTable.subject | capitalize  }})</span>
                   
                    
                </td>  
          
        </tr> 

         <tr>
              <td class="day">Wednesday</td>

                <td v-for="(timeTable,index) in wednesdaySchdule" :key="index" >

                  <span class="class-room">{{ timeTable.classRoom | capitalize  }}</span>
                  <span class="class-time">{{ timeTable.time | capitalize  }}</span>
                  <br>
                 <span class="teacher-name text-center">{{ timeTable.teacher | capitalize  }}<br></span>
                  <span class="subject-name">({{ timeTable.subject | capitalize  }})</span>
                   
                    
                </td>  
          
        </tr> 

        <tr>
              <td class="day">Thrusday</td>

                <td v-for="(timeTable,index) in thrusdaySchdule" :key="index" >

                  <span class="class-room">{{ timeTable.classRoom | capitalize  }}</span>
                  <span class="class-time">{{ timeTable.time | capitalize  }}</span>
                  <br>
                 <span class="teacher-name text-center">{{ timeTable.teacher | capitalize  }}<br></span>
                  <span class="subject-name">({{ timeTable.subject | capitalize  }})</span>
                   
                    
                </td>  
          
        </tr> 

        <tr>
              <td class="day">Friday</td>

                <td v-for="(timeTable,index) in thrusdaySchdule" :key="index" >

                  <span class="class-room">{{ timeTable.classRoom | capitalize  }}</span>
                  <span class="class-time">{{ timeTable.time | capitalize  }}</span>
                  <br>
                 <span class="teacher-name text-center">{{ timeTable.teacher | capitalize  }}<br></span>
                  <span class="subject-name">({{ timeTable.subject | capitalize  }})</span>
                   
                    
                </td>  
          
        </tr> 

         <tr>
              <td class="day">Saturday</td>

                <td v-for="(timeTable,index) in saturdaySchdule" :key="index" >

                  <span class="class-room">{{ timeTable.classRoom | capitalize  }}</span>
                  <span class="class-time">{{ timeTable.time | capitalize  }}</span>
                  <br>
                 <span class="teacher-name text-center">{{ timeTable.teacher | capitalize  }}<br></span>
                  <span class="subject-name">({{ timeTable.subject | capitalize  }})</span>
                   
                    
                </td>  
          
        </tr> 
       
        

        
        
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
          id:4,
          day:'monday',
          teacher:'usman',
          subject:'English',
          time:'9:00-10:00',
          classRoom:'cr3'

        },
         {
          id:4,
          day:'monday',
          teacher:'mehreen',
          subject:'Math',
          time:'9:00-10:00',
          classRoom:'cr3'

        },
          {
          id:4,
          day:'monday',
          teacher:'Ijaz',
          subject:'OOP',
          time:'9:00-10:00',
          classRoom:'cr4'

        },
        {
           id:32,
          day:'tuesday',
          teacher:'usman',
          subject:'English',
          time:'9:00-10:00',
          classRoom:'cr3'

        },
        {
           id:32,
          day:'tuesday',
          teacher:'test',
          subject:'English',
          time:'9:00-10:00',
          classRoom:'cr3'

        },
        {
           id:32,
          day:'saturday',
          teacher:'test',
          subject:'English',
          time:'9:00-10:00',
          classRoom:'cr3'

        },
         {
            id:43,
          day:'Wednesday',
          teacher:'usman',
          subject:'English',
          time:'9:00-10:00',
          classRoom:'cr3'

        },{
           id:334,
          day:'thrusday',
          teacher:'usman',
          subject:'English',
          time:'9:00-10:00',
          classRoom:'cr3'

        },
         {
            id:544,
          day:'friday',
          teacher:'usman',
          subject:'English',
          time:'9:00-10:00',
          classRoom:'cr3'

        },
        
       {
          id:644, 
          day:'sunday',
          teacher:'usman',
          subject:'English',
          time:'9:00-10:00',
          classRoom:'cr3'

        },
        {
            id:43,
          day:'Wednesday',
          teacher:'usman',
          subject:'English',
          Time:'9:00',
          classRoom:'cr3'

        },
       
        
      
      ]
    };
  },
  computed:{
    mondaySchdule:function(){
      return this.items.filter(data=> data.day.toLowerCase() == 'monday'  );
    },
    tuesdaySchdule:function(){
       return this.items.filter(data=>data.day.toLowerCase() == 'tuesday');
    },
    wednesdaySchdule:function(){
       return this.items.filter(data=>data.day.toLowerCase() == 'wednesday');
    },
    thrusdaySchdule:function(){
       return this.items.filter(data=>data.day.toLowerCase() == 'thrusday');
    },
    fridaySchdule:function(){
       return this.items.filter(data=>data.day.toLowerCase() == 'friday');
    },
    saturdaySchdule:function(){
       return this.items.filter(data=>data.day.toLowerCase() == 'saturday');
    },
    sundaySchdule:function(){
       return this.items.filter(data=>data.day.toLowerCase() == 'sunday');
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
