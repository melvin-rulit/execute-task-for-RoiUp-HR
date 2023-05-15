export default {
    state: {
        client: "",
        unicum_link_client: "",
        errors: "",
    },

    getters: {

        UseСlient(state) {
            return state.client;
        },
        Get_unicum_link_client(state) {
            return state.unicum_link_client;
        },
        Get_validation_errors(state) {
            return state.errors;
        },
    },

    mutations: {

        getСlient(state, client) {
            state.client = client;
        },

        getResponse_register_client(state, response) {
            state.unicum_link_client = response.message;
        },

        errors_validation(state, errors) {
            state.errors = errors;
        },
    },

    actions: {

        send_data_for_register_client({ commit }, { form }) {

            axios.post(`api/client`, {
                    name: form.name,
                    phone_number: form.phone_number,
                })
                .then((response) => {
                    commit("getResponse_register_client", response.data);
                })
                .catch((error) => {
                    if (error.response.status === 422) {
                        commit(
                            "errors_validation",
                            error.response.data.errors.name
                        );
                    }
                });
        },
    },
};
