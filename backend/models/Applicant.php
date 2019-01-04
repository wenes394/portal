<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "applicant".
 *
 * @property int $applicant_id
 * @property int $user_id
 * @property int $notice_id
 * @property string $name
 * @property string $surname
 * @property string $experienceforjob
 * @property string $cvfilelink
 * @property string $about_yourself
 *
 * @property Bildiriler $notice
 * @property User $user
 */
class Applicant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applicant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'notice_id', 'name', 'surname', 'experienceforjob', 'cvfilelink', 'about_yourself'], 'required'],
            [['user_id', 'notice_id'], 'integer'],
            [['experienceforjob', 'about_yourself'], 'string'],
            [['name', 'surname'], 'string', 'max' => 255],
            [['cvfilelink'], 'string', 'max' => 500],
            [['notice_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bildiriler::className(), 'targetAttribute' => ['notice_id' => 'self_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'applicant_id' => 'Applicant ID',
            'user_id' => 'User ID',
            'notice_id' => 'Notice ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'experienceforjob' => 'Experienceforjob',
            'cvfilelink' => 'Cvfilelink',
            'about_yourself' => 'About Yourself',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotice()
    {
        return $this->hasOne(Bildiriler::className(), ['self_id' => 'notice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
