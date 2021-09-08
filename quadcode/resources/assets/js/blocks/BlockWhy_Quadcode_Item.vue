<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-locale type="a17-filefield" :attributes="{ label: 'Image', itemLabel: 'image', note: 'Add one image', fieldNote: '', max: 1, filesizeMax: 0, name: fieldName('icon'), }"
></a17-locale><a17-locale type="a17-textfield" :attributes="{ label: 'Title', name: fieldName('title'), type: 'text', inStore: 'value' }" ></a17-locale><a17-locale type="a17-textfield" :attributes="{ label: 'Description', name: fieldName('description'), type: 'text', inStore: 'value' }" ></a17-locale>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
