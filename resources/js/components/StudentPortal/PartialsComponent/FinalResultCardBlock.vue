<template>
   <div class="result-car-wrapper">
     <fieldset class="form-field-sets">
       <legend class="form-field-set-name text-center">1st Semester</legend>
    <v-simple-table dense>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">Code</th>
            <th class="text-left">Course Tilte</th>
            <th class="text-left">Credit Hours </th>
            <th class="text-left">Marks </th>
            <th class="text-left">Grade</th>
          </tr>
          
        </thead>
        <tbody>
          <tr>
            <td>CSI-405</td>
            <td>Object Oriented</td>
            <td>3(1-2)</td>
            <td>56</td>
            <td>A</td>
          </tr>
           <tr>
            <td>CSI-405</td>
            <td>Object Oriented</td>
            <td>3(1-2)</td>
            <td>56</td>
            <td>A</td>
          </tr>
           <tr>
            <td>CSI-405</td>
            <td>Object Oriented</td>
            <td>3(1-2)</td>
            <td>56</td>
            <td>A</td>
          </tr>
           <tr>
            <td>CSI-405</td>
            <td>Object Oriented</td>
            <td>3(1-2)</td>
            <td>56</td>
            <td>A</td>
          </tr>
          <tr>
            <td></td>
            <td><b>Semester GPA : 3.0</b></td>
            <td><b>18</b></td>
            <td><b>450</b></td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
    </fieldset>
     <v-footer
    dark
    padless
  >
    <v-card
      flat
      tile
      class="indigo lighten-1 white--text text-center"
    >
      

      <v-card-text class="white--text pt-0 text-center">
      <span class="footer-semester">Semester 6</span>
       <span class="cgpa-footer">CGPA : 3.21</span>
       <span></span>
      </v-card-text>

    </v-card>
  </v-footer>
  </div>
</template>
<script>
export default {
  name: "FinalResultCardBlock",

}
</script>
<style scoped>
.footer-semester{
  float: left;
  padding: 10px;
}
.cgpa-footer{
  float: right;
  padding: 10px;
}
.indigo{
  width: 100%;
}
.form-field-sets{
  margin: 15px 0;
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
</style>
