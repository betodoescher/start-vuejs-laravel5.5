<template>
  <card>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h2 class="page-header">Influência</h2>
        <div class="divider"></div>
      <h4 class="sub-header">Total de pesquisas realizadas</h4>
    <div class="divider"></div>
      <table class="table">
        <thead class="thead-inverse">
          <tr>
            <th>Total</th>
            <th>Realizadas</th>
            <th>Com Restrição</th>
            <th>Longa Permanência</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>11</th>
            <td>11</td>
            <td>11</td>
            <td>11</td>
          </tr>
        </tbody>
      </table>

    <div class="divider"></div>

      <div class="row chart">
        <div class="form-group col-md-6">
          <bar-chart :data="bar"></bar-chart>
        </div>
        <div class="form-group col-md-6">
          <pie-chart :data="pie"></pie-chart>
        </div>
      </div>

    </div>
  </card>
</template>

<script>
import Vue from "vue";
import Chartkick from 'chartkick'
import VueChartkick from 'vue-chartkick'
import Chart from 'chart.js'

Vue.use(VueChartkick, { Chartkick })

export default {
  metaInfo() {
    return { title: "Influência" };
  },
  data: () => ({
    bar: [['X-Small', 5], ['Small', 27]],
    pie: [['Blueberry', 44], ['Strawberry', 23]]
  }),
  mounted() {
  }
};
</script>
