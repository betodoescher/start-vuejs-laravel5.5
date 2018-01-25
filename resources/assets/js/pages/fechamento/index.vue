<template>
<div>
  
  <card>
    <div>
     <vue-good-table
        :columns="columns"
        :rows="rows"
        nextText="Próximo"
        prevText="Anterior"
        width="50%"
        globalSearchPlaceholder="Filtro"
        rowsPerPageText="Linhas por página"
        :paginate="true">
        <template slot="table-row-after" slot-scope="props">
            <td>
              <button class="btn btn-info" @click="onClick('edit-item', props.row)"><i class="fa fa-edit"></i> {{txtEditar}}</button>
              <button class="btn btn-danger" @click="onClick('delete-item', props.row)"><i class="fa fa-trash"></i> {{txtExcluir}}</button>
            </td>
        </template>
        </vue-good-table>
    </div>
  </card>
</div>
</template>

<script>
import Vue from "vue";
import VueGoodTable from "vue-good-table";
Vue.use(VueGoodTable);

export default {
  scrollToTop: false,
  name: "app-fechamento",
  data: () => ({
    columns: [
      {
        label: "ID",
        field: "id",
        type: "number",
        html: false,
        filterable: true,
        placeholder: "Filtro",
        thClass: "text-center",
        tdClass: "text-center",
        width: "5%"
      },
      {
        label: "Descrição",
        field: "descricao",
        filterable: true,
        placeholder: "Filtro",
        width: "40%"
      },
      {
        label: "Tipo",
        field: "refeicao_classificacao.descricao",
        filterable: true,
        placeholder: "Filtro",
        width: "20%"
      },
      {
        label: "Hora inicial",
        field: "hora_inicio_refeicao",
        filterable: true,
        tdClass: "text-center",
        width: "10%"
      },
      {
        label: "Hora final",
        field: "hora_final_refeicao",
        filterable: true,
        tdClass: "text-center",
        width: "10%"
      },
      {
        label: "",
        field: "",
        type: "name",
        html: true,
        tdClass: "text-center",
        width: "35%"
      }
    ],
    rows: []
  }),
  created() {
    this.gridRefresh();
  },
  methods: {
    async validateBeforeSubmit() {},
    popular(id) {},
    gridRefresh() {}
  }
};
</script>
