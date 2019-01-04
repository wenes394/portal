<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bildiriler".
 *
 * @property int $self_id
 * @property int $notice_id
 * @property string $header
 * @property string $description
 * @property string $date
 * @property string $expired
 *
 * @property Applicant[] $applicants
 * @property Bildirituru $notice
 */
class Bildiriler extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bildiriler';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['notice_id', 'header', 'description', 'date', 'expired'], 'required'],
            [['notice_id'], 'integer'],
            [['description'], 'string'],
            [['date', 'expired'], 'safe'],
            [['header'], 'string', 'max' => 150],
            [['notice_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bildirituru::className(), 'targetAttribute' => ['notice_id' => 'notice_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'self_id' => 'Self ID',
            'notice_id' => 'Notice ID',
            'header' => 'Header',
            'description' => 'Description',
            'date' => 'Date',
            'expired' => 'Expired',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplicants()
    {
        return $this->hasMany(Applicant::className(), ['notice_id' => 'self_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotice()
    {
        return $this->hasOne(Bildirituru::className(), ['notice_id' => 'notice_id']);
    }
}
