<?php

namespace backend\modules\elearning\models;

use Yii;

/**
 * This is the model class for table "lesson_content".
 *
 * @property int $id
 * @property int|null $subject_id
 * @property int $lesson_id
 * @property int $chapter_id
 * @property string $title
 * @property string $content
 * @property int $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'lesson_id', 'chapter_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['lesson_id', 'chapter_id', 'title', 'content', 'status'], 'required'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_id' => 'Subject ID',
            'lesson_id' => 'Lesson ID',
            'chapter_id' => 'Chapter ID',
            'title' => 'Title',
            'content' => 'Content',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
