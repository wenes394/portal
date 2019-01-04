<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bildirituru".
 *
 * @property int $notice_id
 * @property string $category
 *
 * @property Bildiriler[] $bildirilers
 */
class Bildirituru extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bildirituru';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['category'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'notice_id' => 'Notice ID',
            'category' => 'Kategori',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBildirilers()
    {
        return $this->hasMany(Bildiriler::className(), ['notice_id' => 'notice_id']);
    }
}
