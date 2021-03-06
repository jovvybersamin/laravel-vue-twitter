import { get } from "lodash";

export default {
    namespaced: true,

    state: {
        tweets: []
    },

    getters: {
        tweets(state) {
            return state.tweets.sort((a, b) => b.created_at - a.created_at);
        }
    },

    mutations: {
        PUSH_TWEETS(state, data) {
            state.tweets.push(...data.filter((tweet) => {
                return !state.tweets.map((t) => t.id).includes(tweet.id);
            }));
        },

        SET_LIKES(state, { tweet_id, user_id, count }) {
            state.tweets = state.tweets.map(tweet => {
                if (tweet.id === tweet_id) {
                    tweet.likes_count = count;
                }

                if (get(tweet.original_tweet, 'id', null) === tweet_id) {
                    tweet.original_tweet.likes_count = count;
                }

                return tweet;
            });
        }
    },

    actions: {
        async getTweets({ commit }, url) {
            let response = await axios.get(url);

            commit('PUSH_TWEETS', response.data.data);
            commit('likes/PUSH_LIKES', response.data.meta.likes, { root: true });
            commit('retweets/PUSH_RETWEETS', response.data.meta.retweets, { root: true });

            return response;
        }
    }
}
