<?php foreach ($v->widgets as $name): ?>
    <div>
        <?php $l->widget($name); ?>
    </div>
<?php endforeach; ?>