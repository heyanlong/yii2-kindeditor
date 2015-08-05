<?php
/**
 * @copyright Copyright (c) heyanlong
 * @link https://www.hyl.pw
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace heyanlong\kindeditor;


use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;
use yii\widgets\InputWidget;

/**
 * KindEditor renders a KindEditor js plugin for classic editing.
 * @see http://kindeditor.org/documentation
 * @author Yanlong He <yanlong_he@163.com>
 * @link https://www.hyl.pw
 * @package heyanlong\kindeditor
 */
class KindEditor extends InputWidget
{

    public $clientOptions;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if ($this->hasModel()) {
            return $this->renderActiveTextarea();
        } else {
            return $this->renderTextarea();
        }
    }

    /**
     * render textarea for ActiveForm
     * @return string
     */
    protected function renderActiveTextarea()
    {
        return Html::activeTextarea($this->model, $this->attribute, $this->options);
    }

    /**
     * render textarea for widget
     * @return string
     */
    protected function renderTextarea()
    {
        return Html::textarea($this->name, $this->value, $this->options);
    }

    /**
     * Register client script
     */
    protected function registerPlugin()
    {
        $js = [];
        $view = $this->getView();

        KindEditorAsset::register($view);

        $id = $this->options['id'];

        $options = $this->clientOptions !== false && !empty($this->clientOptions) ? Json::encode($this->clientOptions) : '{}';

        $js[] = 'KindEditor.ready(function(K) {';
        $js[] = 'window.editor = K.create(\'#' . $id . '\', ' . $options . ');';
        $js[] = '});';

        $view->registerJs(implode("\n", $js), View::POS_READY);
    }
}