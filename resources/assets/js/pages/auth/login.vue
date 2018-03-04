<template>
  <div class="row">
    <div class="col-lg-6 m-auto ">
      <card id="loginWraper">
          <div class="text-center row" style="width: 100%">
            <!-- <div class="form-group col-md-6 col-xs-6">
                  <img :src="logo" width="100%" alt="" style="margin:-5px 0  0 0" >
            </div>
            <div class="form-group col-md-6 col-xs-6">
                  <img :src="ico" width="35%" class="sistema" alt="">
            </div> -->
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
    logo: window.config.images_path + 'logo-cssj.png',
    ico: window.config.images_path + 'Imagem1.png',
    form: new Form({
      email: "admin@admin.com",
      password: "secret"
    }),
    remember: false
  }),
  methods: {
    async login() {
      // Submit the form.
      const { data } = await this.form.post(window.config.api_url+"/api/login");

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
#loginWraper {
    background: #fff url('data:image/gif;base64,R0lGODlhZQIFAPUAAACAMwCAZgCAzACA/wCqMwCqZgCqzACq/wDVMwDVZgDVzDOAzDOqMzOqZjOqzDOq/zPVMzPVZjPVzDPV/2YrZmYrmWZVmWaqAGaqM2aq/2bVAGbVM2bVzGbV/5kAM5kAZpkrM5krZpkrmZlVZplVmZmqAJmqM5nVAJnVM8wAM8wAZswrM8wrZswrmcxVZszVAMz/AP8rZv8rmf9VZv9Vmf+AAP+AM/+Amf+AzP+qAP+qM/+qmf+qzP/VAP//AAAAACH5BAAHAP8ALAAAAABlAgUAAAb/wIlwSCwaJ4+DQclcOpvQpzQqqlqv2Kx2mwV9Qt8weCwOs2Ky2CwdQ7fZ8LfcTY/T1bwbTn/j+/d/fYCDgoI2OTWIiomMi46NkI+SkYk5PZeYmZqbnJ2emy8+Ly89MKQvMD2joqSmqqmroyclGyUoFycmGiYnGLm7vb+8vrrDwsHFyCe9AAAEzc/RztPRBAQM1tja19zb3t3gDEfj5OXjU+hR6ulOXO7v8B5k82VkZ2psd3b7c/x0SBIyTHCAhMODgRMySHiwcOGEDgrYrZsoUUQIEhZFYLS4UWOIKhsvWiHxUWMVkSBPfmABQkWIliFWfJHJcqUXECxovJkRQ+ca/54+ZQDFN/RnT6JHZ7RAQ8NPoKeEoBbCoYPSpKtWs2K9ZKlrD69gv4oNS3as2bKqQo0qdQqW2lZt0/rQhYKWLWC1UOC9yyvvXr19+Z7wqwvDswCHmwVQDG0xAwYIsEG4FpnAZMiSKWfGnA3BtQJIOhBkSLph6dOmTQ/sQFp0aCQSY1NssiAjySojRpbE+DEkb4+4T/7mvdIDiw8wZca0yfxnGqM6gxYVmpS69Oo8ZUgowoFIh+1DOjzcnsSJ+dmypXSscNJCFfYh2IuA736+Rfn0398XKU+MlxBj/DcGGPcIxcJzS6FxRhoHtpGgDAvG0GAMD0Y4Q0567IBDVBwWIv/VH4doJSJWJFplyScopqiiJqOc0qKLLaYV44sv2ELLMcQAk2Ngt9RFGDJ/XYDCMNAUaY0zzxQAjTWWdVPAZA18BqWUBETJQAGbcSNeeA91Kd6XXoa55XfigRceeOcZkB56VFhRAUbyUVCFe/G9dxF+VtRn35xWvDQgcvMIaEYbSuFDaIQTVuhGom8gqlNCqp1W0EGkCeEAO2umVwUFv/W5EW8dcZQSSsJhAWBMBH6RQgjHsWocTCs5p4Yb0CF13a22SvgcDhp62OGHHeIw4rAlFlsJV8iKpeyJzCbb7LLORvsVKq+0Um0p18LiSiowAGlMjzfSZVeP3gYDbl5C1qX/wS0ELKZku80oOQ0120QAzmXc4JsZvlYmcCVAAo3mkMAHEYxQpZRCWjASD62TKZsOfNBpb1qEakVuGdlW0sYkfOGScQTK0yoLIMtz1HMQroHGdCxj57JOEppZ5pgTmCnBlkKU18QAD2uKxZv6lWSf0PC5mfGefIog0xchyAPgF/093TSrb7iwKMyKMshG1ro6uJOETf0qtq9k6xGisWgTG8mJymLCdrJua/J223DXrUpad78o4yl77+2jLUKOK2S5O5obOLooAEkLkfMWOQ1iACCmTWWYUR6Z5Zxto+81XZpTDnjd1Sx6zWOS94QAbPZsgH6h7nbfSRpVIPR8GMsXGkJ9IQHq8Z8gzEMgoWzATB3XjCq46NZt6BQEADs=') no-repeat;
    border: 1px solid #efefef;
    background-size: 100% auto;
    border-top: 0px;
    margin-top: 50px;
    box-shadow: 0px 0px 25px 3px #ccc;
}
</style>
