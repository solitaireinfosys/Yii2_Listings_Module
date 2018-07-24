<?php

namespace app\models;

use Yii;
use yii\base\Model;
/**
 * SearchCelebrities represents the model behind the search form about `common\models\BaseCelebrities`.
 */
class SearchItems extends Model {

    const PAGE_SIZE = null;
    const LIMIT = 12;

    public $search;

    /**
     * @inheritdoc
     */
    public function rules() 
    {
        return [
            // username and password are both required
            [['search'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'search' => 'Search',
        ];
    }

    
}
