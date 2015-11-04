<?php
/**
 * @link https://github.com/himiklab/yii2-sortable-grid-view-widget
 * @copyright Copyright (c) 2014 HimikLab
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace himiklab\sortablegrid;

use yii\helpers\Url;
use kartik\dynagrid\DynaGrid;

/**
 * Sortable version of Yii2 DynaGrid widget.
 *
 * @author HimikLab
 * @package himiklab\sortablegrid
 */
class SortableDynaGrid extends DynaGrid
{
    /** @var string|array Sort action */
    public $sortableAction = ['sort'];

    public function init()
    {
        parent::init();
        $this->sortableAction = Url::to($this->sortableAction);
    }

    public function run()
    {
        $this->registerWidget();
        parent::run();
    }

    protected function registerWidget()
    {
        $view = $this->getView();
        $view->registerJs("jQuery('#{$this->options['id']}').SortableGridView('{$this->sortableAction}');");
        SortableGridAsset::register($view);
    }
}
