@twillBlockTitle('Video')
@twillBlockIcon('image')
@twillBlockGroup('app')

@formField('input', [
    'name' => 'title',
    'label' => 'Title',
    'translated' => true,
])

@formField('medias', [
    'name' => 'image',
    'label' => 'Cover photo',
])

@formField('files', [
    'name' => 'video',
    'label' => 'Video',
    'noTranslate' => true,
])

@formField('files', [
    'name' => 'video_full',
    'label' => 'Video full',
    'noTranslate' => true,
])
