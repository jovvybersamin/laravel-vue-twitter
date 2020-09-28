<template>
  <a
    href="#"
    class="block py-4 px-2 hover:bg-gray-700"
    @click.prevent="handleClick"
  >
    <slot />
  </a>
</template>

<script>
export default {
  methods: {
    handleClick(e) {
      this.$emit("click", e);
      this.$parent.close();
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
