<template>
    <!-- eslint-disable -->
    <div class="block__body">
        @twillBlockTitle('Video')
@twillBlockIcon('image')
@twillBlockGroup('app')<a17-locale type="a17-textfield" :attributes="{ label: 'Title', name: fieldName('title'), type: 'text', inStore: 'value' }" ></a17-locale><a17-inputframe label="Cover photo" name="medias.image" > <a17-mediafield :name="fieldName('image')" crop-context="image" :width-min="0" :height-min="0" > </a17-mediafield> </a17-inputframe> <a17-locale type="a17-filefield" :attributes="{ label: 'Video', itemLabel: 'video', note: 'Add one video', fieldNote: '', max: 1, filesizeMax: 0, name: fieldName('video'), }"
></a17-locale><a17-locale type="a17-filefield" :attributes="{ label: 'Video full', itemLabel: 'video full', note: 'Add one video full', fieldNote: '', max: 1, filesizeMax: 0, name: fieldName('video_full'), }"
></a17-locale>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
