export default {

    state: {
        client:'',

    },

    getters: {
        UseСlient(state){
            return state.client
        },

    },

    mutations: {

        getСlient(state, client) {
            state.client = client

        },

    },

    actions: {

        GetAllClients({commit}) {

            // axios.get(`api/admins_panel/fhuefhreifyegyrfgtweeuyg`)
            axios.get(`api/client`)
                .then((response) => {
                    commit('getСlient', response.data.data)
                })
        },


    },

}