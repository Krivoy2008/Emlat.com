<?php
/**
 * Films model config
 */
return array(
    'title' => 'News',
    'single' => 'News',
    'model' => 'App\News',
    /**
     * The display columns
     */
    'form_width' => '600',
    'columns' => array(
        'id',
        'title_news'=>[
            'title'=>'Article Title',
        ],
        'img_url'=>[
            'title'=>'Image',
            'output' => '<img src="/images/news/(:value)" height="100" />',
            'sortable'=>false
        ],
        'body'=>[
            'title'=>'Article Text'
        ]


    ),
    'rules'=>[
        'title_news'=>'required',
        'slug'=>'required|unique'
    ],

    'filters' => array(
        'id',
        'title_news' => array(
            'title' => 'Name',
        )
    ),

    'edit_fields'=>[
        'id'=>[
          'type'=>'key',
            'title'=>'ID'
        ],
        'title_news'=>[
            'type'=>'text',
            'title'=>'Article Title'
        ],
        'body'=>[
            'type'=>'wysiwyg',
            'title'=>'Article Text'
        ],
        'slug'=>[
            'type'=>'text',
            'title'=>'Slug'
        ],
        'metakeywords'=>[
            'type'=>'textarea',
            'title'=>'Article Metakeywords'
        ],
        'metadescription'=>[
            'type'=>'textarea',
            'title'=>'Article Metakeywords'
        ]
    ]

);