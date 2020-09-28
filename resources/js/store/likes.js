import axios from "axios"
import { without } from "lodash";

export default {
    namespaced: true,

    state: {
        likes: []
    },

    getters: {
        likes(state) {
            return state.likes;
        }
    },

    mutations: {
        PUSH_LIKES(state, data) {
            state.likes.push(...data);
        },

        PUSH_LIKE(state, id) {
            state.likes.push(id);
        },

        POP_LIKE(state, id) {
            state.likes = without(state.likes, id);
        }
    },

    actions: {
        async like(_, tweetId) {
            const response = await axios.post(`/api/tweets/${tweetId}/likes`);
        },

        async unlike(_, tweetId) {
            const response = await axios.delete(`/api/tweets/${tweetId}/likes`);
        },

        syncLikes({ commit, state }, id) {
            if (state.likes.includes(id)) {
                commit('POP_LIKE', id);
                return;
            }
            commit('PUSH_LIKE', id);
        }


    }
}
