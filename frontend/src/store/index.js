import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)
axios.defaults.baseURL = 'https://rulestorear.dk/api/public/api'

export default new Vuex.Store({
    state: {
        token: localStorage.getItem('access_token') || null,
        user: localStorage.getItem('name') || null
    },
    getters: {
        loggedIn (state) {
            return state.token !== null
        },
        getUserName (state) {
            return state.user !== null
        }
    },
    mutations: {
        storeToken (state, token) {
            state.token = token
        },
        destroyToken (state) {
            state.token = null
        },
        storeUser (state, user) {
            state.user = user.name
        },
        clearUser (state) {
            state.user = null
        }
    },
    actions: {
        register (context, data) {
            return new Promise((resolve, reject) => {
              axios
                .post('/register', {
                  name: data.name,
                  address: data.address,
                  phone: data.phone,
                  email: data.email,
                  password: data.password,
                  password_confirmation: data.confirmPassword
                })
                .then(response => {
                  resolve(response)
                })
                .catch(error => {
                  reject(error)
                })
            })
        },
        destroyToken (context) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token
      
            if (context.getters.loggedIn) {
              return new Promise((resolve, reject) => {
                axios.post('/logout')
                  .then(response => {
                    localStorage.removeItem('access_token')
                    context.commit('destroyToken')
                    resolve(response)
                  })
                  .catch(error => {
                    localStorage.removeItem('access_token')
                    context.commit('destroyToken')
                    reject(error)
                  })
              })
            }
        },
        async retrieveToken (context, credentials) {
            try {
              const response = await axios.post('/login', {
                email: credentials.email,
                password: credentials.password
              })
              const user = response.data.user
              localStorage.setItem('name', user.name)
              context.commit('storeUser', user)

              const token = response.data.token
              localStorage.setItem('access_token', token)
              context.commit('storeToken', token)
            } catch (error) {
              throw error
            }
        },
        clearUser(context){
            context.commit('clearUser')
            localStorage.removeItem('name')
        },
        getProducts() {
            return new Promise((resolve, reject) => {
                axios
                    .get('/products')
                    .then(response => {
                        resolve(response)
                    })
                    .catch(error => {
                        reject(error)
                    })
            })
        }
    }
})
