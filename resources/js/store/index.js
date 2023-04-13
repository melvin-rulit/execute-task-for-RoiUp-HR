    //-----------------------------------  Vuex ---------------------------------------------//

    import { createStore } from 'vuex'


    import Register_clients from './modules/register_clients'
    import CRUD_clients from './modules/crud_clients'
    import Generate_or_delete_link from './modules/generate_or_delete_link'


    const store = createStore({

        modules: {
            Register_clients,
            CRUD_clients,
            Generate_or_delete_link

        }

    });

    export default store





