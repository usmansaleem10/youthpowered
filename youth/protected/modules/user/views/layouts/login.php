<?php

$this->beginContent(Yum::module()->baseLayout);

Yum::renderFlash();

echo $content;

$this->endContent();
