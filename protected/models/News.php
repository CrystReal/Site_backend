<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keywords
 * @property string $meta_robots
 * @property string $meta_autor
 * @property string $alias
 * @property string $header
 * @property string $data
 * @property string $short_data
 * @property string $cdate
 * @property string $udate
 * @property integer $author
 *
 * @property CUploadedFile $image
 */
class News extends CActiveRecord
{

    public $image;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'news';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('link, meta_title, header, data, short_data, udate, author', 'required'),
            array('author', 'numerical', 'integerOnly' => true),
            array('meta_title, meta_desc, meta_keywords', 'length', 'max' => 2048),
            array('meta_robots, meta_autor', 'length', 'max' => 512),
            array('header', 'length', 'max' => 1024),
            array('cdate', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, meta_title, meta_desc, meta_keywords, meta_robots, meta_autor, header, data, short_data, cdate, udate, author', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            "user" => [self::BELONGS_TO, "Users", "author"]
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keywords' => 'Meta Keywords',
            'meta_robots' => 'Meta Robots',
            'meta_autor' => 'Meta Autor',
            'header' => 'Название',
            'data' => 'Полный текст',
            'short_data' => 'Краткое описание',
            'cdate' => 'Дата',
            'udate' => 'Udate',
            'author' => 'Автор',
            'active' => 'Активность',
            'image' => 'Изображение',
            'link' => 'Ссылка',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('meta_title', $this->meta_title, true);
        $criteria->compare('meta_desc', $this->meta_desc, true);
        $criteria->compare('meta_keywords', $this->meta_keywords, true);
        $criteria->compare('meta_robots', $this->meta_robots, true);
        $criteria->compare('meta_autor', $this->meta_autor, true);
        $criteria->compare('header', $this->header, true);
        $criteria->compare('data', $this->data, true);
        $criteria->compare('short_data', $this->short_data, true);
        $criteria->compare('cdate', $this->cdate, true);
        $criteria->compare('udate', $this->udate, true);
        $criteria->compare('author', $this->author);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return News the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function defaultScope()
    {
        return [
            "order" => "cdate DESC"
        ];
    }

    public function beforeValidate()
    {
        if (strlen($this->cdate) != 10) {
            $this->cdate = new CDbExpression('NOW()');
        } else {
            $this->cdate = date_format(date_create($this->cdate), 'Y-m-d');
        }
        $this->udate = new CDbExpression('NOW()');
        if ($this->meta_title == '' OR $this->meta_title == NULL) {
            $this->meta_title = $this->header;
        }
        return parent::beforeValidate();
    }

    public function afterFind()
    {
        $this->cdate = date_format(date_create($this->cdate), 'd-m-Y');
    }

    public function afterSave()
    {
        if ($this->image != null) {
            if (!$this->image->hasError) {
                if (is_file(Yii::app()->params['storeImages']['path'] . "news/" . $this->id . ".png")) unlink(Yii::app()->params['storeImages']['path'] . "news/" . $this->id . ".png");
                $this->image->saveAs(Yii::app()->params['storeImages']['path'] . "news/" . $this->id . ".png");

            }
        }
        parent::afterSave();
    }

    public function afterDelete()
    {
        if (is_file(Yii::app()->params['storeImages']['path'] . 'news/' . $this->id . '.png')) unlink(Yii::app()->params['storeImages']['path'] . 'news/' . $this->id . '.png');
        foreach (glob(Yii::app()->params['storeImages']['thumbPath'] . 'news/*') as $item) {
            if (is_dir($item)) {
                if (file_exists($item . "/" . $this->id . ".png"))
                    unlink($item . "/" . $this->id . ".png");
            }
        }
        parent::afterDelete();
    }

    public function getAuthor()
    {
        return $this->user->username;
    }

}