<template>
  <div class="time-table-wrapper">
    <v-card max-width="96%">
      <v-card-title>
        Time Tables
        <v-btn class="create-btn" @click="createTimeTable()">Create New Time Table</v-btn>
      </v-card-title>
      <v-card-subtitle>All Department of Semester Time Table is here</v-card-subtitle>
      <v-card-text>
        <v-simple-table>
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">Program</th>
                <th class="text-left">Semester</th>
                <th class="text-left">Shift</th>
                <th class="text-left">Section</th>
                <th class="text-left">Status</th>
                <th class="text-left">Created At</th>
                <th class="text-left">Modify At</th>
                <th class="text-left">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>BSSE</td>
                <td>6th</td>
                <td>Moring</td>
                <td>A</td>
                <td>
                  <v-chip color="green" class="status-chip">Public</v-chip>
                </td>
                <td>Monday 20,2020</td>
                <td>Monday 22,202</td>
                <td>
                  <v-menu offset-y>
                    <template v-slot:activator="{ on, attrs }">
                      <v-icon color="primary" v-bind="attrs" v-on="on">mdi-dots-vertical</v-icon>
                    </template>
                    <v-list>
                      <v-list-item>
                        <v-list-item-title>Preview</v-list-item-title>
                      </v-list-item>
                      <v-list-item>
                        <v-list-item-title>Modify</v-list-item-title>
                      </v-list-item>
                      <v-list-item>
                        <v-list-item-title>Change Status</v-list-item-title>
                      </v-list-item>
                      <v-list-item>
                        <v-list-item-title>Delete</v-list-item-title>
                      </v-list-item>
                    </v-list>
                  </v-menu>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
      </v-card-text>
    </v-card>
  </div>
</template>

<script>
export default {
  name: "AllTimeTable",
  methods: {
    createTimeTable: function() {
      this.$router.push({ name: "createTimeTable" });
    }
  }
};
</script>
<style scoped>
.create-btn {
  position: absolute;
  float: right;
  right: 10px;
}
.status-chip {
  color: white;
}
</style>