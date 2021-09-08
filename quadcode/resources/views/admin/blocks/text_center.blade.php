@formField('wysiwyg', [
    'name' => 'content',
    'label' => 'Content',
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

@formField('input', [
    'name' => 'add_class',
    'label' => 'Additional block class',
    'translated' => false,
])
