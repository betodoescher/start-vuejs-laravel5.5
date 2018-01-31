<template>
<div>

  <card title="Totais referente ao mês e ano">
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


  </card>

<br>

  <card Title="Gráficos">
      <div class="row chart">
        <div class="form-group col-md-6 text-center">
          <h4>Totais por unidade</h4>
          <br>
          <column-chart :data="column"></column-chart>
        </div>
        <div class="form-group col-md-6 text-center">
          <pie-chart :data="pie"></pie-chart>
        </div>
      </div>
  </card>

  
</div>
</template>

<script>
import Vue from "vue";
import Chartkick from "chartkick";
import VueChartkick from "vue-chartkick";
import Chart from "chart.js";

Vue.use(VueChartkick, { Chartkick });

export default {
  data: () => ({
    column: [["Sun", 32], ["Mon", 46], ["Tue", 28]],
    pie: [['Blueberry', 44], ['Strawberry', 23]]
  }),
  mounted() {}
};
</script>
