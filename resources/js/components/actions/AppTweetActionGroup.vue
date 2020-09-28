<template>
  <ul class="flex mt-4">
    <li class="w-4/12">
      <app-tweet-comment-action :tweet="tweet"></app-tweet-comment-action>
    </li>
    <li class="w-4/12">
      <app-tweet-retweet-action :tweet="tweet"></app-tweet-retweet-action>
    </li>
    <li class="w-4/12">
      <app-tweet-like-action :tweet="tweet"></app-tweet-like-action>
    </li>
  </ul>
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
