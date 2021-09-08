<template>
    <!-- eslint-disable -->
    <div class="block__body">
        @twillBlockTitle('Gallery')
@twillBlockIcon('flex-grid')
@twillBlockGroup('app')<a17-textfield label="Folder" :name="fieldName('folder')" type="text" in-store="value" ></a17-textfield>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
