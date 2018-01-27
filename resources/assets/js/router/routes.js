export default [
  // { path: '/', name: 'welcome', component: require('~/pages/welcome') },
  { path: '/', name: 'login', component: require('~/pages/auth/login') },

  // Authenticated routes.
  ...middleware('auth', [
    { path: '/home', name: 'home', component: require('~/pages/home') },
    { path: '/exames', name: 'exames', component: require('~/pages/exames') },
    { path: '/internacao', name: 'internacao', component: require('~/pages/internacao') },
    { path: '/prontoatendimento', name: 'prontoatendimento', component: require('~/pages/prontoatendimento') },
    //  { path: '/dashboard', name: 'dashboard', component: require('~/pages/dashboard') },
    { path: '/settings', component: require('~/pages/settings/index'), children: [
      { path: '', redirect: { name: 'settings.profile' }},
      { path: 'profile', name: 'settings.profile', component: require('~/pages/settings/profile') },
      { path: 'password', name: 'settings.password', component: require('~/pages/settings/password') }
    ] },
     { path: '/dashboard', component: require('~/pages/dashboard/index'), children: [
       { path: '', redirect: { name: 'dashboard.geral' }},
       { path: 'geral', name: 'dashboard.geral', component: require('~/pages/dashboard/geral') },
       { path: 'influencia', name: 'dashboard.influencia', component: require('~/pages/dashboard/influencia') }
     ] }

  ]),

  // Guest routes.
  ...middleware('guest', [
    // { path: '/login', name: 'login', component: require('~/pages/auth/login') },
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
