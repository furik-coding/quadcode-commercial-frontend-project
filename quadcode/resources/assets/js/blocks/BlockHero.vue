<template>
    <!-- eslint-disable -->
    <div class="block__body">
        <a17-locale type="a17-textfield" :attributes="{ label: 'Title', name: fieldName('title'), type: 'text', inStore: 'value' }" ></a17-locale><a17-locale type="a17-wysiwyg" :attributes="{ label: 'Description', name: fieldName('description'), options: {&quot;modules&quot;:{&quot;toolbar&quot;:[{&quot;header&quot;:[2,3,false]},&quot;bold&quot;,&quot;italic&quot;,&quot;link&quot;,{&quot;list&quot;:&quot;ordered&quot;},{&quot;list&quot;:&quot;bullet&quot;}],&quot;syntax&quot;:false}}, editSource: true, inStore: 'value' }" ></a17-locale> <a17-inputframe label="Bg Photo" name="medias.image" note="Minimum image width: 1920px" > <a17-mediafield :name="fieldName('image')" crop-context="image" :width-min="0" :height-min="0" > </a17-mediafield> </a17-inputframe> <a17-locale type="a17-filefield" :attributes="{ label: 'Video', itemLabel: 'video', note: 'Add one video', fieldNote: '', max: 1, filesizeMax: 0, name: fieldName('video'), }"
></a17-locale>
    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
