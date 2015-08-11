<?php
/**
 * @copyright Copyright (c) heyanlong
 * @link https://www.hyl.pw
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace heyanlong\kindeditor;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
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
        $options = [
            'width' => '100%'
        ];
        if ($this->clientOptions != null) {
            $this->clientOptions = ArrayHelper::merge($options, $this->clientOptions);
        } else {
            $this->clientOptions = $options;
        }


        parent::init();
    }

    public function run()
    {
        $this->registerPlugin();
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

        //$js[] = 'KindEditor.ready(function(K) {';
        $js[] = 'window.editor[' . $id . '] = KindEditor.create(\'#' . $id . '\', ' . $options . ');';
        //$js[] = '});';

        $view->registerJs(implode("\n", $js));
    }
}