<?php echo $this->bar; ?>
<div class="container">
    <div class="restaurante">
        <?php foreach ($this->bares as $key => $menu) { ?>
            <div class="menu" align="center"><a href="/files/<?php echo $menu->menu_bar ?>" target="blank"><i class="fas fa-utensils"></i> <?php echo $menu->menu_nombre ?></a></div>
        <?php } ?>
    </div>
</div>