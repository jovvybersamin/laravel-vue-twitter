<template>
  <div class="flex w-full">
    <div class="mr-3">
      <img :src="tweet.user.avatar" class="w-12 rounded-full" />
    </div>
    <div class="flex-grow">
      <app-tweet-username :user="tweet.user"></app-tweet-username>
      <p class="text-gray-300 whitespace-pre-wrap">{{ tweet.body }}</p>

      <app-tweet :tweet="tweet.original_tweet" class="border border-gray-600 rounded-lg mt-4"></app-tweet>

      <app-tweet-action-group :tweet="tweet"></app-tweet-action-group>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    tweet: {
      required: true,
      type: Object,
    },
  },
};
</script>
