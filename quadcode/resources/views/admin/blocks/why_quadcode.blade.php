@formField('input', [
    'name' => 'title',
    'label' => 'Title',
    'translated' => true,
])

@formField('input', [
    'name' => 'add_class',
    'label' => 'Additional block class',
    'translated' => false,
])

@formField('repeater', ['type' => 'why_quadcode_item'])
