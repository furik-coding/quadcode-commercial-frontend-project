@formField('input', [
    'name' => 'title',
    'label' => 'Title',
    'translated' => true,
])

@formField('wysiwyg', [
    'name' => 'description',
    'label' => 'Description',
    'translated' => true,
    'toolbarOptions' => [
        ['header' => [2, 3, false]],
        'bold',
        'italic',
        'link',
        'list-ordered',
        'list-unordered',
    ],
    'editSource' => true,
])

@formField('medias', [
    'name' => 'image',
    'label' => 'Bottom image',
])
