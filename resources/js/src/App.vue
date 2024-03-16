<template>
  <v-row no-gutters align-self="center">
    <v-col cols="12">
      <v-sheet class="ma-16" color="transparent">
        <v-card color="transparent" :loading="loading">
          <v-row no-gutters>
            <v-col class="pa-4">
              <v-select
                v-model="departureAirport"
                label="Відправлення"
                item-title="name"
                item-value="code"
                :items="airports"
                variant="underlined"
              >
                <template v-slot:item="{ props, item }">
                  <v-list-item
                    v-bind="props"
                    :subtitle="item.raw.code"
                  ></v-list-item>
                </template>
              </v-select>
            </v-col>
            <v-col class="pa-4">
              <v-select
                v-model="arrivalAirport"
                label="Прибуття"
                item-title="name"
                item-value="code"
                :items="airports"
                variant="underlined"
              >
                <template v-slot:item="{ props, item }">
                  <v-list-item
                    v-bind="props"
                    :subtitle="item.raw.code"
                  ></v-list-item>
                </template>
              </v-select>
            </v-col>
            <v-col class="pa-4">
              <v-text-field
                type="date"
                label="Date"
                v-model="departureDate"
                variant="underlined"
              ></v-text-field>
            </v-col>
          </v-row>

          <v-card-actions>
            <v-btn
              block
              size="large"
              prepend-icon="mdi-refresh"
              append-icon="mdi-refresh"
              variant="tonal"
              @click="loadFlights"
            >
              Пошук
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-sheet>
    </v-col>
  </v-row>

  <v-alert v-show="showErrors" type="error" class="ma-5 font-italic"
    >{{ errorTextMessages }}
  </v-alert>

  <v-row
    v-for="flight in flights"
    no-gutters
    class="ma-5"
    style="background-color: white"
  >
    <v-col cols="3" class="pa-5 text-center align-self-center">
      <h5 style="color: blue">
        {{ flight.transporter.name }} {{ flight.flightNumber }}
      </h5>
    </v-col>
    <v-col cols="6" class="pa-5 text-center text-center align-self-center">
      <h4>
        <span class="font-italic" style="color: gray"
          >({{ flight.departureDateTime }})</span
        >
        {{flight.departureAirport}} - {{flight.arrivalAirport}}
        <span class="font-italic" style="color: gray"
          >({{ flight.arrivalDateTime }})</span
        >
      </h4>
    </v-col>
    <v-col cols="3" class="pa-5 text-center text-center align-self-center">
      <h5>Тривалість: {{ flight.duration }} хв</h5>
    </v-col>
  </v-row>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
 import '@vuepic/vue-datepicker/dist/main.css';
 import axios from 'axios'

 const username = "user@example.com"
 const password = "secret"

export default defineComponent({
   data() {
     return {
       departureAirport: null,
       arrivalAirport: null,
       departureDate: null,
       loading: false,
       showErrors: false,
       errorTextMessages: 'sadas',
       flights: [],
       airports: [
         { name: 'Kyiv Zhuliany', code: 'IEV' },
         { name: 'Kyiv Boryspil', code: 'KBP' },
         { name: 'Valencia', code: 'VLC' },
         { name: 'Frankfurt', code: 'FRA' },
         { name: 'Marseille Provence', code: 'MRS' },
         { name: 'Krakow', code: 'KRK' },
         { name: 'Barcelona–El Prat', code: 'BCN' },
         { name: 'Paphos', code: 'PFO' },
         { name: 'Dublin', code: 'DUB' }
       ]
     };
   },
   methods: {
     loadFlights() {
       this.loading = true;
       this.showErrors = false;
       this.flights = [];
       this.searchQuery = {
         searchQuery: {
           departureAirport: this.departureAirport,
           arrivalAirport: this.arrivalAirport,
           departureDate: this.departureDate
         }
       };

       this.auth = {
         auth: {
           username: username,
           password: password
         }
       };

       axios.post(`/api/search`, this.searchQuery, this.auth)
       .then((response) => {
         this.flights = response.data.searchResults;

         if(!this.flights.length){
           this.errorTextMessages = 'Нічого не знайдено!';
           this.showErrors = true;
         }
       }).catch((error) => {
           this.showErrors = true;
           var errors = error.response.data.errors;
           var textErrors = '';

           Object.keys(errors).forEach((key) => {
             errors[key].forEach(function (value) {
               textErrors = textErrors + '*' + value + '; ';
             });
           });

           this.errorTextMessages = textErrors;

       }).finally(() => {
         this.loading = false;
       });
     },
   },
	setup() {
		return {

     };
	},
});
</script>
