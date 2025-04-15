<div class="container d-flex justify-content-center align-items-center flex-column">

  <div class="wrapper">
    <div class="title"><span>Login validadores</span></div>
    <form action="/validacion/index/validarusuario" method="post">
      <div class="row">
        <i class="fas fa-user"></i>
        <input type="text" name="user" placeholder="Ingrese su usuario" required />
      </div>
      <div class="row">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Ingrese su password" required />
      </div>
      <input type="hidden" name="csrf" value="<?php echo $this->csrf; ?>" />
      <?php if ($this->error_login) { ?>
        <div class="alert alert-danger mt-3" role="alert">
          <strong>Error!</strong> <?php echo $this->error_login; ?>
        </div>
      <?php } ?>

      <?php if ($this->uid) { ?>
        <input type="hidden" name="uid" value="<?php echo $this->uid; ?>" />
      <?php } ?>

      <?php if ($this->token) { ?>
        <input type="hidden" name="token" value="<?php echo $this->token; ?>" />
      <?php } ?>

      <div class="row button">
        <input type="submit" value="Login" />
      </div>
    </form>
  </div>
</div>

<style>
  header {
    height: 125px;
  }

  footer {
    height: 165px;
  }

  .contenedor-general {
    height: calc(100dvh - 290px);
    display: grid;
    place-items: center;
  }

 
</style>