

<template>

<div>

    <card title="Usuários" class="ui container">
        <form @submit.prevent="validateBeforeSubmit">
            <app-alert ref="alert" @endCountDown="gridRefresh" :dismissSecs="dismissSecs"></app-alert>

            <div class="row">

                <div class="form-group col-md-6">
                    <label class="required">Nome</label>
                    <input name="nome" v-model="form.name" v-validate="'required'" :class="{'form-control': true, 'is-invalid': errors.has('nome') }" type="text">
                    <div class="help-block invalid-feedback" v-if="errors.has('nome')">{{errors.first('nome')}}</div>
                </div>

                <div class="form-group col-md-6">
                    <label class="required">Email</label>
                    <input name="email" v-model="form.email" v-validate="'required|email'" :class="{'form-control': true, 'is-invalid': errors.has('email') }" type="text">
                    <div class="help-block invalid-feedback" v-if="errors.has('email')">{{errors.first('email')}}</div>
                </div>

                <div class="form-group col-md-6">
                    <label class="required">CPF</label>
                    <the-mask :mask="['###.###.###-##']" name="cpf" v-model="form.cpf" v-validate="'required|cpf'" :class="{'form-control': true, 'is-invalid': errors.has('cpf') }" />
                    <div class="help-block invalid-feedback" v-if="errors.has('cpf')">{{errors.first('cpf')}}</div>
                </div>

                <div class="form-group col-md-6">
                    <label class="required">Senha</label>
                    <input name="senha" v-model="form.password" v-validate="'required'" :class="{'form-control': true, 'is-invalid': errors.has('senha') }" type="password">
                    <div class="help-block invalid-feedback" v-if="errors.has('senha')">{{errors.first('senha')}}</div>
                </div>

                <div class="form-group col-md-6">
                    <label class="required">Confirme a senha</label>
                    <input name="password_confirmation" v-model="form.password_confirmation" v-validate="'required'" :class="{'form-control': true}" type="password">
                    <div class="help-block invalid-feedback" v-if="errors.has('password_confirmation')">{{errors.first('password_confirmation')}}</div>
                </div>

                <div class="form-group col-md-6">
                    <label class="required">Tipo</label>
                    <select v-model="form.tipo_usuario" v-validate="'required'" name="tipo" :class="{'form-control': true }">
                        <option v-for="option in tipo_acessos" v-bind:value="option.value" v-bind:key="option.value">
                            {{ option.text }}
                        </option>
                    </select>
                    <div class="help-block invalid-feedback" v-if="errors.has('tipo')">{{errors.first('tipo')}}</div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12 ml-md-auto">
                    <v-button type="success" :loading="form.busy">Salvar</v-button>
                </div>
            </div>

        </form>
    </card>
    <br>
    <card>
        <div>
            <app-grid :columns="columns" :store="users" @pageChanged="gridRefresh" @searchTable="searchTable" @populate="popular" @delete="excluir" />
        </div>
    </card>
</div>

</template>

<script>

import Vue from "vue";
import Form from "vform";
import Service from "../../services/UsuarioService";
import Grid from "../../components/global/grid";

export default {
    scrollToTop: false,
    name: "app-usuarios",
    data: () => ({
      dismissSecs: 5,
        tipo_acessos: [{
            text: "Adminstrador",
            value: '1'
        }, {
            text: "Pesquisa",
            value: '2'
        }, {
            text: "Dashboard",
            value: '3'
        }],
        form: new Form({
            id: null,
            nome: null,
            email: null,
            cpf: null,
            password: null,
            password_confirmation: null,
            tipo_usuario: 1
        }),
        columns: [{
            label: "ID",
            field: "id",
            type: "number",
            html: false,
            thClass: "text-center",
            tdClass: "text-center",
            width: "5%"
        }, {
            label: "Nome",
            field: "name"
        }, {
            label: "Email",
            field: "email"
        }, {
            label: "CPF",
            field: "cpf"
        }, {
            label: "Tipo",
            field: "tipo_descricao"
        }, {
            label: "",
            field: "",
            type: "name",
            html: true,
            tdClass: "text-center",
            width: "20%"
        }],
        rows: [],
        store: {}
    }),
    created() {
        this.gridRefresh();
    },
    methods: {
        async validateBeforeSubmit() {
                this.$validator.validateAll().then(result => {
                    if (result) {
                        var retorno = false;
                        if (this.form.id) {
                            retorno = this.form.put(Service.url +'/'+ this.form.id);
                        } else {
                            retorno = this.form.post(Service.url);
                        }
                        const {
                            data
                        } = retorno;
                        this.form.reset();
                        this.$validator.reset();
                        this.gridRefresh();
                        this.$refs["alert"].showAlertSuccess();
                    }
                });
            },
            popular(id) {
                this.$store.dispatch('users/getUser', id)
                this.form = new Form(Object.assign({}, this.form, this.$store.state.users.user));
            },
            excluir(id) {
                this.$store.dispatch('users/deleteUser', id).then(response => {
                    this.$refs["alert"].showAlertDelete();
                })
                this.gridRefresh();
            },
            gridRefresh(pageChanged) {
              if(!pageChanged){
                let pageChanged = 1
              }
                this.$store.dispatch('users/getUsers', {
                    page: pageChanged
                })
            },
            searchTable(term) {
                this.$store.dispatch('users/getUsers', {
                    term: term
                }, term)
            }

    },
    computed: {
        users() {
            return this.$store.state.users.usersList
        }
    }
};

</script>
