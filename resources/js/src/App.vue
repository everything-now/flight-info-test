<template>
    <v-row no-gutters align-self="center" >
      <v-col cols="12" >
        <v-sheet class=" ma-16 " color="transparent">
          <v-card color="transparent">
            <v-row no-gutters>
      <v-col class=" pa-4">
        <v-select
        v-model="departureAirport"
  label="Відправлення"
  item-title="name"
  :items="airports"
  variant="underlined"
>
<template v-slot:item="{ props, item }">
      <v-list-item v-bind="props" :subtitle="item.raw.code"></v-list-item>
    </template>
</v-select>
      </v-col>
      <v-col class=" pa-4">
        <v-select 
  v-model="arrivalAirport"
  label="Прибуття"
  item-title="name"
  item-value="code"
  :items="airports"
  variant="underlined"
>
<template v-slot:item="{ props, item }">
      <v-list-item v-bind="props" :subtitle="item.raw.code"></v-list-item>
    </template>
</v-select>
      </v-col>
      <v-col class=" pa-4">
        <v-text-field type="date" label="Date" variant="underlined"></v-text-field>

      </v-col>
    </v-row>

            <v-card-actions>
              <v-btn block
              size="large"
  prepend-icon="mdi-refresh"
  append-icon="mdi-refresh"
  variant="tonal"
>
Пошук
</v-btn>
            </v-card-actions>
          </v-card>
        </v-sheet>
      </v-col>
    </v-row>
    
    <v-row no-gutters class="ma-5" style="background-color: white;">
      <v-col cols="3" class=" pa-5 text-center align-self-center" >
            <h5 style="color:blue">Ryanair RY4556</h5>
      </v-col>
      <v-col cols="6" class=" pa-5 text-center text-center align-self-center">
            <h4> <span class="font-italic" style="color:gray">(2022-12-13 14:15)</span> Valencia - Krakow <span class="font-italic" style="color:gray">(2022-12-13 14:15)</span></h4>
      </v-col>
      <v-col cols="3" class=" pa-5 text-center text-center align-self-center">
            <h5>Тривалість: 120 хв</h5>
      </v-col>
    </v-row>

</template>

<script lang="ts">
	import { defineComponent } from 'vue';
  import VueDatePicker from '@vuepic/vue-datepicker';
  import '@vuepic/vue-datepicker/dist/main.css';


	export default defineComponent({
    components: { 
      VueDatePicker,
      getMessageWithAxios(){
          axios.get('/get-message').then(response => {
              alert(response.data.message);
          });
      },
     },
    data() {
      return {
        departureAirport: null,
        arrivalAirport: null,
        date: null,
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
		setup() {
			return {

      };
		},
	});
</script>