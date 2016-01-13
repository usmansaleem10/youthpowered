<?php

$this->beginContent(Yum::module()->baseLayout);

echo Yum::renderFlash();

echo $content;

$this->endContent();
?>
