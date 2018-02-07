<template>
  <div class="row">
    <div class="col-lg-6 m-auto ">
      <card id="loginWraper">
          <div class="text-center row" style="width: 100%">
            <div class="form-group col-md-6 col-xs-6">
                  <img src="/images/logo-cssj.png" width="100%" alt="" style="margin:-5px 0  0 0" >
            </div>
            <div class="form-group col-md-6 col-xs-6">
                  <img src="/images/Imagem1.png" width="35%" class="sistema" alt="">
            </div>
          </div>
        <form @submit.prevent="login" @keydown="form.onKeydown($event)">
          <p></p>
          <p></p>
          <h2 class="text-info dotted">Acessar sua conta</h2>
          <p>Digite seu nome de usuário e senha para acessar o sistema.</p>
          <!-- Usuário -->
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><span class="fa fa-user"></span></span>
            </div>
            <input v-model="form.email" type="text" name="email" class="form-control"
              :class="{ 'is-invalid': form.errors.has('email') }">
            <has-error :form="form" field="email"></has-error>
          </div>


          <!-- Password -->
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><span class="fa fa-asterisk"></span></span>
            </div>
            <input v-model="form.password" type="password" name="password" class="form-control"
                :class="{ 'is-invalid': form.errors.has('password') }">
              <has-error :form="form" field="password"></has-error>
          </div>

          <!-- Remember Me -->
          <div class="form-group row">
            <div class="col-md-3"></div>
            <div class="col-md-7">
              <router-link :to="{ name: 'password.request' }" class="float-right small">
                {{ $t('forgot_password') }}
              </router-link>

              <!-- <checkbox v-model="remember">{{ $t('remember_me') }}</checkbox> -->
            </div>
          </div>

          <div class="form-group row" style="float: right">
            <div class="col-md-7 d-flex">
              <!-- Submit Button -->
              <v-button :loading="form.busy">
                {{ $t('login') }}
              </v-button>

              <!-- GitHub Login Button -->
              <a v-if="githubAuth" href="/oauth/github" class="btn btn-primary pull-right">
                 {{ $t('login_with') }}
                <fa :icon="['fab', 'github']"/>
              </a>
            </div>
          </div>
        </form>
      </card>
    </div>
  </div>
</template>

<script>
import Form from "vform";

export default {
  metaInfo() {
    return { title: this.$t("login") };
  },

  data: () => ({
    form: new Form({
      username: "",
      password: ""
    }),
    remember: false
  }),

  methods: {
    async login() {
      // Submit the form.
      const { data } = await this.form.post("/api/login");

      // Save the token.
      this.$store.dispatch("auth/saveToken", {
        token: data.token,
        remember: this.remember
      });

      // Fetch the user.
      await this.$store.dispatch("auth/fetchUser");

      // Redirect home.
      this.$router.push({ name: "home" });
    }
  },

  computed: {
    githubAuth: () => window.config.githubAuth
  }
};
</script>
<style scope>
 .dotted {
  border: 2px dotted #f7f9fb;
  border-style: none none dotted;
  color: #fff;
  background-color: #fff;
} 
body {
  background: url("/images/bg.png") center -30px;
}
#loginWraper {
    background: #fff url("/images/cores.gif") no-repeat;
    border: 1px solid #efefef;
    background-size: 100% auto;
    border-top: 0px;
    margin-top: 50px;
    box-shadow: 0px 0px 25px 3px #ccc;
}
</style>
