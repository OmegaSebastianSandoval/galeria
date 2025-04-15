<?php echo $this->restaurante; ?>
<div class="container">
    <div class="restaurante mt-4">
        <?php foreach ($this->resta as $key => $menu) { ?>
        <?php if($menu->menu_restaurante_link){?>
                    <div class="menu mt-4" align="center"><a href="<?php echo $menu->menu_restaurante_link ?>" target="blank"><i class="fas fa-utensils"></i> <?php echo $menu->menu_nombre ?></a></div>

        <?php }else{?>
            <div class="menu mt-4" align="center"><a href="/files/<?php echo $menu->menu_restaurante ?>" target="blank"><i class="fas fa-utensils"></i> <?php echo $menu->menu_nombre ?></a></div>
        <?php } ?>
        <?php } ?>
    </div>
</div>
