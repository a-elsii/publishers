<?php
/**
 * @example
 *  'manager'=>[
 *      'permission'=>['back-office','show-hidden'],// правило к которому дать доступ
 *      // доступ к котроллеру
 *      'controller'=>[
 *          'news'=>'all',
 *          'olp_series'=>['index','view'],
 *          'test'=>['index','view','create','update','delete','restore'],
 *          'test_quest'=>['index','view','create','update','delete','restore'],
 *      ],
 *  ],
 */

return [
    'support'=>[
        'permission'=>[],// правило к которому дать доступ
        // доступ к котроллеру
        'controller'=>[
            'news'=>'all',
            'gift_spin_main'=>'all',
        ],
    ],
];