<?php

return [
    'models' => [
        'guide' => [
            'presenter' => \Corals\Modules\Utility\Guide\Transformers\GuidePresenter::class,
            'resource_url' => 'utilities/guides',
            'guide_config' => [
                'title' => 'Guide Config',
                'fields' => [
                    'intro' => [
                        'name' => '[guide_config][{index}][intro]',
                        'type' => 'text',
                        'label' => 'utility-guide::attributes.guide.intro',
                        'status' => 'active',
                        'validation_rules' => 'required',
                    ],
                    'element' => [
                        'name' => '[guide_config][{index}][element]',
                        'type' => 'text',
                        'label' => 'utility-guide::attributes.guide.element',
                        'status' => 'active',
                        'validation_rules' => '',
                    ],
                    'position' => [
                        'name' => '[guide_config][{index}][position]',
                        'type' => 'text',
                        'label' => 'utility-guide::attributes.guide.position',
                        'status' => 'active',
                        'validation_rules' => '',
                    ],
                ],
            ],
        ],
    ],
];
