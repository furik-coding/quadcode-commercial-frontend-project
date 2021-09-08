<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-inputframe label="Bg Photo" name="medias.image" note="Minimum image width: 1920px" > <a17-mediafield :name="fieldName('image')" crop-context="image" :width-min="0" :height-min="0" > </a17-mediafield> </a17-inputframe> <a17-locale type="a17-filefield" :attributes="{ label: 'Video', itemLabel: 'video', note: 'Add one video', fieldNote: '', max: 1, filesizeMax: 0, name: fieldName('video'), }"
></a17-locale>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
