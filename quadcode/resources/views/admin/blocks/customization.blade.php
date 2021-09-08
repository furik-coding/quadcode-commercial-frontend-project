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

@formField('input', [
    'name' => 'logo_caption',
    'label' => 'Logo caption',
    'translated' => true,
])

@formField('input', [
    'name' => 'colour_caption',
    'label' => 'Color caption',
    'translated' => true,
])

@formField('input', [
    'name' => 'menu_caption',
    'label' => 'Menu caption',
    'translated' => true,
])


@formField('input', [
    'name' => 'add_class',
    'label' => 'Additional block class',
    'translated' => false,
])
