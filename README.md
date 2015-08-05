KindEditor Widget for Yii2
========================

Renders a [KindEditor WYSIWYG HTML editor plugin](http://kindeditor.net/demo.php) widget.

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require heyanlong/yii2-kindeditor:~1.0
```
or add
```json
"heyanlong/yii2-kindeditor" : "~1.0"
```

to the require section of your application's `composer.json` file.

Usage
-----
```
use heyanlong\kindeditor\KindEditor;
<?= $form->field($model, 'text')->widget(KindEditor::className()) ?>
```
or
```
use heyanlong\kindeditor\KindEditor;
<?= KindEditor::widget() ?>
```

Contacts
--------
* Email: yanlong_he@163.com
* Twitter: https://twitter.com/YanlongHe
* Website: https://www.hyl.pw/

License
-------

The BSD License (BSD). Please see [License File](LICENSE.md) for more information.