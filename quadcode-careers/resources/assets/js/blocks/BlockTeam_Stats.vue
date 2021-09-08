<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-repeater type="team_stats_item" :name="repeaterName('team_stats_item')" ></a17-repeater>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
