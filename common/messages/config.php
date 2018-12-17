<?php

return [
    'color' => null,
    'interactive' => true,
    'help' => null,
    'sourcePath' => 'frontend',
    'messagePath' => 'common/messages',
//    'languages' => ['pt-PT','ru-RU','uk-UA','en-US'],// языки на которые будет поддерживать приложение
    'translator' => 'Yii::t',
    'sort' => false,
    'overwrite' => true,
    'removeUnused' => false,
    'markUnused' => true,
    'except' => [
        '.svn',
        '.git',
        '.gitignore',
        '.gitkeep',
        '.hgignore',
        '.hgkeep',
        '/messages',
        '/BaseYii.php',
    ],
    'only' => [
        '*.php',
    ],
    'format' => 'db',
    'db' => 'db',
    'sourceMessageTable' => '{{%source_message}}',// название таблицы с исходными сообщениями
    'messageTable' => '{{%message}}',// название таблицы с переводами
    'ignoreCategories' => ['yii'],// игнорируем категории
];