<template>
  <card>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h2 class="page-header">Influência</h2>
      <h4 class="sub-header">Total de pesquisas realizadas em 07/2016 (11)</h4>
     
      <line-chart
        :data="datacollection"
        :options="{responsive: false, maintainAspectRatio: false}"
        :width="400"
        :height="200"
        >
      </line-chart>


    </div>
  </card>
</template>

<script>
import { Line } from 'vue-chartjs'

export default {
 extends: Line,
  scrollToTop: false,

  metaInfo() {
    return { title: "Geral" };
  },

  data: () => ({}),

  methods: {},
  mounted () {
    // Overwriting base render method with actual data.
    this.renderChart({
      datacollection: {
        labels: ['January', 'February'],
        datasets: [
          {
            label: 'Data One',
            backgroundColor: '#f87979',
            data: [40, 20]
          }
        ]
      }
    })
  }

};
</script>
