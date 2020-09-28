<template>
  <div>
    <div v-click-outside="close" @click.prevent="open = !open" class="relative">
      <slot name="trigger" />
    </div>
    <div
      class="absolute w-56 bg-gray-900 rounded-lg overflow-hidden z-50 shadow-light"
      v-show="open"
    >
      <slot />
    </div>
  </div>
</template>

<script>
import ClickOutside from "vue-click-outside";

export default {
  data() {
    return {
      open: false,
    };
  },
  methods: {
    close(e) {
      this.open = false;
    },
  },

  directives: {
    ClickOutside,
  },
};
</script>

<style lang="scss" scoped>
</style>
