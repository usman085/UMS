<template>
  <v-card class="mx-auto" max-width="100%" outlined>
    <v-list-item three-line>
      <v-list-item-content>
        <v-list-item-title class="headline mb-1">Personal Information</v-list-item-title>
        <v-list-item-subtitle></v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>

    <v-row>
      <v-col cols="12" xs="12" sm="12" md="6">
        <v-row>
          <v-col cols="4" xs="8" sm="4" md="4">
            <div class="ml-4">
              <p class="body-1">Name</p>
            </div>
          </v-col>
          <v-col cols="1">
            <div class="ml-4">
              <p class="font-weight-black">:</p>
            </div>
          </v-col>
          <v-col cols="5" xs="8" sm="6" md="5">
            <div class="ml-4">
              <p class="body-1">Marcus Obrien</p>
            </div>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="4" xs="8" sm="4" md="4">
            <div class="ml-4">
              <p class="body-1">Father Name</p>
            </div>
          </v-col>
          <v-col cols="1">
            <div class="ml-4">
              <p class="font-weight-black">:</p>
            </div>
          </v-col>
          <v-col cols="5" xs="8" sm="4" md="3">
            <div class="ml-4">
              <p class="body-1">Obrien</p>
            </div>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="4" xs="8" sm="4" md="4">
            <div class="ml-4">
              <p class="body-1">Contact #</p>
            </div>
          </v-col>
          <v-col cols="1">
            <div class="ml-4">
              <p class="font-weight-black">:</p>
            </div>
          </v-col>
          <v-col cols="5" xs="8" sm="4" md="5">
            <div class="ml-4">
              <p class="body-1">+92754567875</p>
            </div>
          </v-col>
        </v-row>
      </v-col>

      <v-col cols="12" xs="12" sm="12" md="6">
        <v-row>
          <v-col cols="4" xs="8" sm="4" md="5">
            <div class="ml-4">
              <p class="body-1">Registeration #</p>
            </div>
          </v-col>

          <v-col cols="1">
            <div class="ml-4">
              <p class="font-weight-black">:</p>
            </div>
          </v-col>

          <v-col cols="5" xs="8" sm="6" md="6">
            <div class="ml-4">
              <p class="body-1">GCUF-2017-085345</p>
            </div>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="4" xs="8" sm="4" md="5">
            <div class="ml-4">
              <p class="body-1">Session</p>
            </div>
          </v-col>

          <v-col cols="1">
            <div class="ml-4">
              <p class="font-weight-black">:</p>
            </div>
          </v-col>

          <v-col cols="5" xs="8" sm="6" md="6">
            <div class="ml-4">
              <p class="body-1">2017 - 2021</p>
            </div>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="4" xs="8" sm="4 " md="5">
            <div class="ml-4">
              <p class="body-1">Current Semester</p>
            </div>
          </v-col>
          <v-col cols="1">
            <div class="ml-4">
              <p class="font-weight-black">:</p>
            </div>
          </v-col>
          <v-col cols="5" xs="8" sm="4" md="4">
            <div class="ml-4">
              <p class="body-1">6th</p>
            </div>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="4" xs="8" sm="4" md="2">
        <div class="ml-4">
          <p class="body-1">Adress</p>
        </div>
      </v-col>
      <v-col cols="1">
        <div class="ml-4">
          <p class="font-weight-black">:</p>
        </div>
      </v-col>
      <v-col cols="6" xs="8" sm="4" md="6
      ">
        <div class="ml-4">
          <p
            class="body-1 float-left"
          >House # 39 usman street Ahmad Avenue College Road Township Lahore</p>
        </div>
      </v-col>
    </v-row>
  </v-card>
</template>
<script>
export default {
  name: "ProfileDetailBlock"
};
</script>
