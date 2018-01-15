<template>
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
            <button class="btn btn-info" @click="onClick('edit-item', props.row)"><i class="fa fa-edit"></i> Editar</button>
            <button class="btn btn-danger" @click="onClick('delete-item', props.row)"><i class="fa fa-trash"></i> Excluir</button>
            </td>
        </template>
        </vue-good-table>
    </div>
</template>
<script>
import Vue from "vue"
import VueGoodTable from "vue-good-table"
Vue.use(VueGoodTable)
export default {
  name: "app-grid",
  data() {
    return {
    }
  },
  props: {
    columns: {
      type: Array
    },
    rows: {
      type: Array
    }
  },
  methods: {
    onClick(action, param) {
      if (action === "edit-item") {
          this.$emit("populate", param.id)
      } else if (action === "delete-item") {
          
        this.$dialog
          .confirm("Deseja excluir esse registro?", {
            okText: "Fechar",
            cancelText: "Ok"
          })
          .then(function() {
              this.$emit("delete", param.id)
          })
      }
    }
  }
}
</script>
<style>

</style>
