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

            axios.get(`api/v1/get_all_clients`)
                .then((response) => {
                    commit('getСlient', response.data.data)
                })
        },


    },

}
