<style>

/* Global Search
  **********************************************/

.global-search {
    position: relative;
    padding-left: 40px;
}

.global-search-icon {
    position: absolute;
    left: 0px;
    max-width: 32px;
}

.global-search-icon > img {
    max-width: 100%;
    margin-top: 8px;
    opacity: 0.5;
}

table .global-search-input {
    width: calc(100% - 30px);
}

</style>

<template>

<div>
    <div class="good-table" width="50%">
        <div class="responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td colspan="6">
                            <div class="global-search">
                                <span class="global-search-icon">
                                  <div  class="magnifying-glass">
                                    <i class="fa fa-search fa-lg"></i>
                                  </div>
                                </span>
                                <input type="text" placeholder="Filtro" class="form-control global-search-input" v-model="globalSearchTerm" @keyup.stop="debounceInput">
                            </div>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <vue-good-table :columns="columns" :rows="rows" width="50%" globalSearchPlaceholder="Filtro" :paginate="false">
        <template slot="table-row-after" slot-scope="props">
            <td>
                <button class="btn btn-info" @click="onClick('edit-item', props.row)"><i class="fa fa-edit"></i> {{txtEditar}}</button>
                <button class="btn btn-danger" @click="onClick('delete-item', props.row)"><i class="fa fa-trash"></i> {{txtExcluir}}</button>
            </td>
        </template>
    </vue-good-table>
    <vue-good-pagination :perPage="store.per_page" :total="store.total" @page-changed="pageChanged" nextText="Próximo" prevText="Anterior" rowsPerPageText="Linhas por página" ofText="Nenhum" allText="Todos">
    </vue-good-pagination>
</div>

</template>

<script>

import Vue from "vue";
import VueGoodTable from "vue-good-table";
import VueGoodPagination from "../global/pagination";
import debounce from "debounce"

Vue.use(VueGoodTable);
export default {
    name: "app-grid",
    excluir: false,
    data() {
        return {
            globalSearchTerm: ''
        };
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
        },
        searchTable() {
            this.$emit("searchTable", this.globalSearchTerm);
        },
        debounceInput: debounce(function(e) {
            this.searchTable()
        }, 500)
    }
};

</script>
