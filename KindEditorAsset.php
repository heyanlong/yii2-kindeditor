<?php
/**
 * @copyright Copyright (c) heyanlong
 * @link https://www.hyl.pw
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

namespace heyanlong\kindeditor;


use yii\web\AssetBundle;

/**
 * KindEditorAsset
 *
 * @see http://kindeditor.org/documentation
 * @author Yanlong He <yanlong_he@163.com>
 * @link https://www.hyl.pw
 * @package heyanlong\kindeditor
 */
class KindEditorAsset extends AssetBundle
{
    public $js = [
        'kindeditor-min.js'
    ];
    public $css = [
        'themes/default/default.css'
    ];

    public function init()
    {
        $this->sourcePath = __DIR__ . 'assets';
        parent::init();
    }
}