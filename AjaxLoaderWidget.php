<?php
/**
 * Simple ajax loader widget class file.
 *
 * @author Taras Suhovenko
 * @property bool included true if already widget include
 * @property string $id Id of the element.
 * @property string title title of the element
 */
class AjaxLoaderWidget extends CWidget {

    private static $included = false;

    public $id = "ajaxSpinnerContainer";
    public $title;

    public function run() {
        if (self::$included) {
            return;
        }
        if ($this->title === null) {
            $this->title = Yii::t('ajaxload', 'Loading...');
        }
        self::$included = true;
        $assetsPath = dirname(__FILE__) . '/assets';
        $assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, YII_DEBUG);
        Yii::app()->clientScript->registerCoreScript('jquery')->registerCssFile($assetsUrl . '/ajaxloader.css')->registerScriptFile($assetsUrl . '/ajaxloader.js');

        $this->render('ajaxLoader', array(
            'id' => $this->id,
            'title' => $this->title
        ));
    }
}
