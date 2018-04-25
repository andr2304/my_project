<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CommentForm extends Model
{
    public $comment;
    
    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'length' => [3,250]]
        ];
    }

    public function saveComment($product_id)
    {
        $comment = new Comment;
        $comment->text = $this->comment;
        $comment->users_id = Yii::$app->user->id;
        $comment->product_id = $product_id;
        $comment->date = date('Y-m-d');
        return $comment->save();

    }
}