<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class LatestItem extends Widget
{
    public $news;
    public $template = 'list';
    public $showLatestPost = false;

    public function init()
    {
        parent::init();
        if ($this->news === null) {
            $this->news = array();
        }
    }

    public function run()
    {
        return $this->render($this->template, [
            'news' => $this->news,
            'showLatestPost' => $this->showLatestPost,
        ]);
    }

}
