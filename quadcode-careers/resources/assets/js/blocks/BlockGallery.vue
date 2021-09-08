<template>
    <!-- eslint-disable -->
    <div class="block__body">
        @twillBlockTitle('Gallery')
@twillBlockIcon('flex-grid')
@twillBlockGroup('app')<a17-locale type="a17-textfield" :attributes="{ label: 'Title', name: fieldName('title'), type: 'text', inStore: 'value' }" ></a17-locale><a17-locale type="a17-wysiwyg" :attributes="{ label: 'Text', name: fieldName('text'), options: {&quot;modules&quot;:{&quot;toolbar&quot;:[&quot;bold&quot;,&quot;italic&quot;,{&quot;list&quot;:&quot;bullet&quot;},{&quot;list&quot;:&quot;ordered&quot;},{&quot;script&quot;:&quot;super&quot;},{&quot;script&quot;:&quot;sub&quot;},&quot;link&quot;,&quot;clean&quot;],&quot;syntax&quot;:false}}, placeholder: 'Text', inStore: 'value' }" ></a17-locale>

    </div>
</template>

<script>
  import BlockMixin from '@/mixins/block'

  export default {
    mixins: [BlockMixin]
  }
</script>
