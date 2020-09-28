<template>
  <div>
    <app-dropdown v-if="!retweeted">
      <template slot="trigger">
        <app-tweet-retweet-action-button :tweet="tweet" />
      </template>
      <app-dropdown-item @click.prevent="retweetOrUnretweetTweet">
        Retweet
      </app-dropdown-item>
      <app-dropdown-item> Retweet with comment </app-dropdown-item>
    </app-dropdown>
    <app-tweet-retweet-action-button
      :tweet="tweet"
      v-else
      @click.prevent="retweetOrUnretweetTweet"
    />
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  props: {
    tweet: {
      required: true,
      type: Object,
    },
  },

  methods: {
    ...mapActions({
      retweetTweet: "retweets/retweetTweet",
      unretweetTweet: "retweets/unretweetTweet",
    }),

    async retweetOrUnretweetTweet() {
      if (this.retweeted) {
        await this.unretweetTweet(this.tweet.id);
        return;
      }

      await this.retweetTweet(this.tweet.id);
    },
  },

  computed: {
    ...mapGetters({
      retweets: "retweets/retweets",
    }),

    retweeted() {
      return this.retweets.includes(this.tweet.id);
    },
  },
};
</script>
