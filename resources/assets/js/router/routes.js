export default [
  // { path: '/', name: 'welcome', component: require('~/pages/welcome') },
  // { path: '/login', name: 'login', component: require('~/pages/auth/login') },

  // Authenticated routes.
  ...middleware('auth', [
    // { path: '/', name: 'home', component: require('~/pages/home') },
    { path: '/home', name: 'home', component: require('~/pages/home') },
    { path: '/exames', name: 'exames', component: require('~/pages/exames') },
    { path: '/internacao', name: 'internacao', component: require('~/pages/internacao') },
    { path: '/prontoatendimento', name: 'prontoatendimento', component: require('~/pages/prontoatendimento') },
    { path: '/usuarios', name: 'usuarios', component: require('~/pages/usuarios') },
    { path: '/settings', component: require('~/pages/settings/index'), children: [
      { path: '', redirect: { name: 'settings.profile' }},
      { path: 'profile', name: 'settings.profile', component: require('~/pages/settings/profile') },
      { path: 'password', name: 'settings.password', component: require('~/pages/settings/password') }
    ] },
    { path: '/dashboard', component: require('~/pages/dashboard/index'), children: [
       { path: '', redirect: { name: 'dashboard.internacoes' }},
       { path: 'internacoes', name: 'dashboard.internacoes', component: require('~/pages/dashboard/internacoes') },
       { path: 'exames', name: 'dashboard.exames', component: require('~/pages/dashboard/exames') },
       { path: 'prontoatendimentos', name: 'dashboard.prontoatendimentos', component: require('~/pages/dashboard/prontoatendimentos') }
    ] },
    { path: '/relatorios', component: require('~/pages/relatorios/index'), children: [
       { path: '', redirect: { name: 'relatorios.internacoes' }},
       { path: 'internacoes', name: 'relatorios.internacoes', component: require('~/pages/relatorios/internacoes') },
       { path: 'exames', name: 'relatorios.exames', component: require('~/pages/relatorios/exames') },
       { path: 'prontoatendimentos', name: 'relatorios.prontoatendimentos', component: require('~/pages/relatorios/prontoatendimentos') }
    ] }

  ]),

  // Guest routes.
  ...middleware('guest', [
    { path: '/', name: 'login', component: require('~/pages/auth/login') },
    { path: '/register', name: 'register', component: require('~/pages/auth/register') },
    { path: '/password/reset', name: 'password.request', component: require('~/pages/auth/password/email') },
    { path: '/password/reset/:token', name: 'password.reset', component: require('~/pages/auth/password/reset') }
  ]),

  { path: '*', component: require('~/pages/errors/404.vue') }
]

/**
 * @param  {String|Function} middleware
 * @param  {Array} routes
 * @return {Array}
 */
function middleware (middleware, routes) {
  routes.forEach(route =>
    (route.middleware || (route.middleware = [])).unshift(middleware)
  )

  return routes
}
