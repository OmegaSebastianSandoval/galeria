<div style="background:#fa3602; padding:20px; width: 600px; margin: auto;" align="center">
    <table  style="background: #FFFFFF;color:#000; font-size:12px; font-family:Arial; padding:20px; width: 600px;">
        
        <tbody  align="left">
            <tr>
                <td colspan="2" align="center"><img style="width: 100px;" src="http://newgaleriacafelibro.omegasolucionesweb.com/skins/page/images/logo-nav.png" alt="Logo Galería Cafe Libro"> <br> </td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Nombres:</th>
                <td><?php echo $this->data["nombre"]; ?> </td>
            </tr>
            <tr>
                <th scope="row">E-mail:</th>
                <td colspan="2">  <?php echo $this->data["email"]; ?></td>
            </tr>
            <tr>
                <th scope="row">Telefono:</th>
                <td colspan="2"><?php echo $this->data["telefono"]; ?></td>
            </tr>
            <tr>
                <th scope="row" >Mensaje:</th>
                <td colspan="2"><?php echo $this->data["mensaje"]; ?></td>
            </tr>
        </tbody>
    </table>
</div>

