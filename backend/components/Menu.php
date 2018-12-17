<?php
/**
 * Created by PhpStorm.
 * User: vpsit
 * Date: 09.05.2018
 * Time: 12:22
 */

namespace backend\components;



use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Menu extends Component
{
    private $items = [];
    private $users_items = [];
    private $activeItems = [];

    public function init()
    {
        \dmstr\widgets\Menu::$iconClassPrefix = '';


        $this->items = [
            ['label' => 'Разделы', 'options' => ['class' => 'header']],
            ['label' => 'Переводы', 'as' => 'translate', 'icon' => 'glyphicon glyphicon-dashboard', 'url' => ['/translate/index']],
            ['label' => 'Языки', 'as' => 'languages', 'icon' => 'glyphicon glyphicon-dashboard', 'url' => ['/languages/index']],

        ];

    }


    public function getItems()
    {
//        exit(print_r($this->items));
        return $this->items;
    }

    public function find($asMenu)
    {
        $result = [
            'top' => [],
            'sub' => [],
        ];

        foreach ($this->items as $key => $item) {
            if (isset($item['as']) && $item['as'] == $asMenu) {
                ArrayHelper::remove($item, 'items');
                $this->items[$key]['active'] = true;
                $result['top'] = $item;
                break;
            }

            if (!isset($item['items'])) {
                continue;
            }

            foreach ($item['items'] as $subKey => $subItem) {
                if (isset($subItem['as']) && $subItem['as'] == $asMenu) {
                    ArrayHelper::remove($item, 'items');
                    $result['top'] = $item;
                    $result['sub'] = $subItem;

                    $this->items[$key]['active'] = true;
                    $this->items[$key]['items'][$subKey]['active'] = true;
                    break 2;
                }
            }
        }

        $this->activeItems = $result;

        return $this->activeItems;
    }

    public function findLabel($asMenu)
    {
        $result = $this->find($asMenu);
        if ($result['sub']) {
            return $result['sub']['label'];
        } elseif ($result['top']) {
            return $result['top']['label'];
        }

        return '';
    }
}