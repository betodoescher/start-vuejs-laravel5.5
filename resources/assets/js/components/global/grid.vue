<template>
    <div>
        <vue-good-table
        :columns="columns"
        :rows="rows"
        width="50%"
        globalSearchPlaceholder="Filtro"
        :paginate="false">
        <template slot="table-row-after" slot-scope="props">
            <td>
              <button class="btn btn-info" @click="onClick('edit-item', props.row)"><i class="fa fa-edit"></i> {{txtEditar}}</button>
              <button class="btn btn-danger" @click="onClick('delete-item', props.row)"><i class="fa fa-trash"></i> {{txtExcluir}}</button>
            </td>
        </template>
        </vue-good-table>
        <vue-good-pagination
          :perPage="store.per_page"
          :total="store.total"
          @page-changed="pageChanged"
          nextText="Próximo"
          prevText="Anterior"
          rowsPerPageText="Linhas por página"
          ofText="Nenhum"
          allText="Todos">
        </vue-good-pagination>
    </div>
</template>
<script>
import Vue from "vue";
import VueGoodTable from "vue-good-table";
import VueGoodPagination from "../global/pagination";

Vue.use(VueGoodTable);
export default {
  name: "app-grid",
  excluir: false,
  data() {
    return {};
  },
  components: {
    VueGoodPagination
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
    },
    store: {}
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
    },
    pageChanged(param) {
      this.$emit("pageChanged", param.currentPage);
    }
  }
};
</script>
<style>

</style>
