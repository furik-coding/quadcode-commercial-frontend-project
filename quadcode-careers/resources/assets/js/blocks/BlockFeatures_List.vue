<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-repeater type="features_list_item" :name="repeaterName('features_list_item')" ></a17-repeater>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
