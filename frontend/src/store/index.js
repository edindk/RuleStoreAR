import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)
axios.defaults.baseURL = 'http://127.0.0.1:8000/api'

export default new Vuex.Store({
    state: {
        products: 'hello'
    },
    mutations: {},
    actions: {
        getProducts(context, data) {
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
    },
    modules: {}
})
