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
              <button class="btn btn-info" @click="onClick('edit-item', props.row)"><i class="fa fa-eye"></i> {{txtEditar}}</button>
            </td>
        </template>
        </vue-good-table>
    </div>
</template>
<script>
import Vue from "vue";
import VueGoodTable from "vue-good-table";
Vue.use(VueGoodTable);
export default {
  name: "app-grid",
  excluir: false,
  data() {
    return {};
  },
  props: {
    columns: {
      type: Array
    },
    rows: {
      type: Array
    },
    txtEditar: {
      type: String,
      default: "Editar"
    },
    txtExcluir: {
      type: String,
      default: "Excluir"
    }
  },
  methods: {
    makeAdmin: function() {
      console.log("makeAdmin");
    },
    doNothing: function() {
      console.log("doNothing");
      // Do nothing or some other stuffs
    },
    onClick(action, param) {
      if (action === "edit-item") {
        this.$emit("populate", param.id);
      } else if (action === "delete-item") {
        this.$dialog
          .confirm("Deseja excluir esse registro?", {
            loader: true,
            okText: "Ok",
            cancelText: "Fechar"
          })
          .then(dialog => {
            this.$emit("delete", param.id);
            dialog.close();
          })
          .catch(() => {});
      }
    }
  }
};
</script>
<style>

</style>
