<?php

namespace tests;


use heyanlong\kindeditor\KindEditor;
use tests\data\models\Post;

class KindEditorTest extends TestCase
{
    public function testRenderWithModel()
    {
        $model = new Post();
        $out = KindEditor::widget([
            'model' => $model,
            'attribute' => 'message'
        ]);

        $expected = '<textarea id="post-message" name="Post[message]"></textarea>';

        $this->assertEqualsWithoutLE($expected, $out);
    }
}
