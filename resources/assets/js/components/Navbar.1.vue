<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <router-link :to="{ name: user ? 'home' : 'login' }" class="navbar-brand">
        <!-- {{ appName }} -->
        <!-- <img src="/images/restaurante-96.png" width="20%" class="sistema" alt="">  -->
        Ouvidoria
      </router-link>
      <div class="collapse navbar-collapse" id="navbarToggler" v-if="user">
        <ul class="navbar-nav">
            <li class="nav-item dropdown" v-if="user.tipo_usuario == 1 || user.tipo_usuario == 2">
              <a class="nav-link dropdown-toggle" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pesquisas
              </a>
              <div class="dropdown-menu">
                <router-link :to="{ name: 'exames' }" class="nav-link">
                  Exame
                </router-link>
                <router-link :to="{ name: 'internacao' }" class="nav-link">
                  Internação
                </router-link>
                <router-link :to="{ name: 'prontoatendimento' }" class="nav-link">
                  Pronto atendimento
                </router-link>
              </div>
            </li>
        </ul>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item" v-if="user.tipo_usuario == 1 || user.tipo_usuario == 3">
              <router-link :to="{ name: 'dashboard.internacoes' }" class="nav-link">
                Dashboard
              </router-link>
            </li>
            <li class="nav-item" v-if="user.tipo_usuario == 1">
              <router-link :to="{ name: 'usuarios' }" class="nav-link">
                Usuários
              </router-link>
            </li>
            <li class="nav-item" v-if="user.tipo_usuario == 1 || user.tipo_usuario == 3">
              <router-link :to="{ name: 'relatorios.internacoes' }" class="nav-link">
                Relatórios
              </router-link>
            </li>
        </ul>

        <ul class="navbar-nav">
          <!-- Authenticated -->
          <li v-if="user" class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark py-0"
              href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img :src="user.photo_url" class="rounded-circle profile-photo mr-1">
              {{ user.name }}
            </a>
            <div class="dropdown-menu">
              <router-link :to="{ name: 'settings.profile' }" class="dropdown-item pl-3">
                <fa icon="cog" fixed-width/>
                {{ $t('settings') }}
              </router-link>

              <div class="dropdown-divider"></div>
              <a @click.prevent="logout" class="dropdown-item pl-3"  href="#">
                <fa icon="sign-out-alt" fixed-width/>
                {{ $t('logout') }}
              </a>
            </div>
          </li>
          <!-- Guest -->
          <template v-else>
            <!-- <li class="nav-item">
              <router-link :to="{ name: 'login' }" class="nav-link" active-class="active">
                {{ $t('login') }}
              </router-link>
            </li> -->
            <!-- <li class="nav-item">
              <router-link :to="{ name: 'register' }" class="nav-link" active-class="active">
                {{ $t('register') }}
              </router-link>
            </li> -->
          </template>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex';
import LocaleDropdown from './LocaleDropdown';
import Service from '../services/UsuarioService';

export default {
  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  components: {
    LocaleDropdown
  },

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style scoped>
.navbar {
  font-weight: 600;
  border-bottom: 1px solid #dee9f2;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
}

.profile-photo {
  height: 2rem;
}
</style>
