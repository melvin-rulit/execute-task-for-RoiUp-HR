export default {

    state: {
        new_link:'',

    },

    getters: {
        UseNewLink(state){
            return state.new_link
        },

    },

    mutations: {

        newLink(state, link) {
            state.new_link = link

        },

    },

    actions: {

        GenerateLink({commit}, {link}) {

            axios.post(`api/v1/send_value_for_get_new_link`, {link: link})
                .then((response) => {
                    commit('newLink', response.data)
                })
        },

        DeleteLink({commit}, {link}) {

            axios.post(`api/v1/send_value_for_delete_link`, {link: link})
                .then((response) => {
                    commit('getLink', response.data.data)
                })
        },


    },

}
