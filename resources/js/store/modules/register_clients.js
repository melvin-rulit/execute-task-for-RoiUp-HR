export default {

    state: {
        client:'',
        unicum_link_client:'',

    },

    getters: {
        UseСlient(state){
            return state.client
        },
        Get_unicum_link_client(state){
            return state.unicum_link_client
        },

    },

    mutations: {

        getСlient(state, client) {
            state.client = client

        },

        getResponse_register_client(state, response) {
            state.unicum_link_client = response

        },

    },

    actions: {

        send_data_for_register_client({commit}, {form}) {

            axios.post(`api/v1/send_data_for_register_client`, {name: form.name, phone_number: form.phone_number})
                .then((response) => {
                commit('getResponse_register_client', response.data)
            })
        },


    },

}
