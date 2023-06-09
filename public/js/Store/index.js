import Vue from 'vue';
import Vuex from 'vuex'
import AdvertStore from './advert/index';

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    ...AdvertStore.state,
  },
  mutations: {
    ...AdvertStore.mutations,
  },
  actions: {
    ...AdvertStore.actions,
  }
})

export default store;
