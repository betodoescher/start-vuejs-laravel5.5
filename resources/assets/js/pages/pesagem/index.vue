<template>
<div>
  <pre>
    {{rows}}
  </pre>
  <card>
    <div class="row"> 
      <div class="form-group col-md-5">
        Período inicial: <the-mask :masked="true" mask="##/##/#### ##:##" name="inicio" v-model.trim="inicio" class="form-control"  placeholder="__/__/____ __:__"   type="text"/>
      </div>
      <div class="form-group col-md-5">
        Período final: <the-mask :masked="true" mask="##/##/#### ##:##" name="fim" v-model.trim="fim" class="form-control"  placeholder="__/__/____ __:__" type="text"/>
      </div>
      <div class="form-group col-md-2" style="margin-top: 23px">
        <v-button type="info" @click="filtrar">Filtrar</v-button> 
        <v-button type="success">Enviar</v-button> 
      </div>
    
    </div>
  <vue-good-table
    :columns="columns"
    :paginate="true"
    nextText="Próximo"
    prevText="Anterior"
    globalSearchPlaceholder="Filtro"
    rowsPerPageText="Linhas por página"
    :rows="rows">
    <template slot="table-column" slot-scope="props">
      <span v-if="props.column.label =='SelectAll'">
        <label class="checkbox">
          <input 
            type="checkbox" 
            @click="toggleSelectAll()">
        </label>
      </span>
      <span v-else>
          {{props.column.label}}
      </span>
    </template>
    <template slot="table-row-before" slot-scope="props">
      <td>
        <label class="checkbox">
          <input type="checkbox" v-model="rows[props.row.originalIndex].selected">
        </label>
      </td>
    </template>
  </vue-good-table>
  </card>
</div>
</template>

<script>
import Vue from "vue"
import VueGoodTable from "vue-good-table"
Vue.use(VueGoodTable)
import moment from "moment"
import VueMomentJS from "vue-momentjs"
Vue.use(VueMomentJS, moment)

export default {
  scrollToTop: false,
  name: "app-pesagem",
  data: () => ({
    allSelected: false,
    inicio: null,
    fim: null,
    columns: [
      {
        label: "SelectAll",
        sortable: false
      },
      {
        label: "Ticket",
        filterable: true,
        placeholder: "Filtro",
        field: "id"
      },
      {
        label: "Centro de custo",
        filterable: true,
        placeholder: "Filtro",
        field: "cc"
      },
      {
        label: "Nome",
        filterable: true,
        placeholder: "Filtro",
        field: "nome"
      },
      {
        label: "Tipo",
        filterable: true,
        placeholder: "Filtro",
        field: "tipo"
      },
      {
        label: "Data/Hora",
        field: "data",
        type: "date",
        tdClass: "text-left",
        inputFormat: "YYYY-MM-DD HH:MM",
        outputFormat: "DD/MM/YYYY HH:MM"
      }
    ],
    rows: [
      {
        selected: false,
        id: "1",
        cc: "Centro de custo 1",
        nome: "Fulano",
        tipo: "Café da manhã",
        data: "2017-01-01 14:00"
      },
      {
        selected: false,
        id: "2",
        cc: "Centro de custo 1",
        nome: "Ciclano",
        tipo: "Almoço",
        data: "2017-02-05 15:00"
      }
    ]
  }),
  methods: {
    toggleSelectAll() {
      this.allSelected = !this.allSelected
      this.rows.forEach(row => {
        if (this.allSelected) {
          row.selected = true
        } else {
          row.selected = false
        }
      })
    },
    filtrar() {
      if (this.inicio && this.fim) {
        this.rows = this.rows.filter(function(row) {
          var filtroIni = moment(this.inicio)
          var iltroFim = moment(this.fim)

          return row.data.isBetween(filtroIni, iltroFim)
        })
      }
    }
  }
}
</script>
