export default {
    namespaced: true,

    state: {
        retweets: []
    },

    getters: {
        retweets(state) {
            return state.retweets;
        }
    },

    mutations: {
        PUSH_RETWEETS(state, data) {
            state.retweets.push(...data);
        },
    },

    actions: {
        async retweetTweet(_, tweetId) {
            const response = await axios.post(`/api/tweets/${tweetId}/retweets`);
        },

        async unretweetTweet(_, tweetId) {
            const response = await axios.delete(`/api/tweets/${tweetId}/retweets`);
        },
    }

}
