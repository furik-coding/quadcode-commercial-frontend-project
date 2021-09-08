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
        'bold',
        'italic',
        'link',
        'list-unordered',
    ],
    'editSource' => true,
])
