<?php if ($this->enviarpago == 1) { ?>
    <form action="<?php echo $this->payment['urlpayment']; ?>" id="formpayu" method="post">
   
        <input type="hidden" name="merchantId" value="<?php echo $this->payment['merchant_id']; ?>" />
        <input type="hidden" name="referenceCode" value="<?php echo $this->payment['referenceCode']; ?>" />
        <input name="test" type="hidden" value="<?php echo $this->payment['test']; ?>">
        <input type="hidden" name="amount" value="<?php echo $this->payment['amount']; ?>" />
        <input type="hidden" name="tax" value="<?php echo $this->payment['tax']; ?>" />
        <input type="hidden" name="taxReturnBase" value="<?php echo $this->payment['taxReturnBase']; ?>" />
        <input type="hidden" name="signature" value="<?php echo $this->payment['signature']; ?>" />
        <input type="hidden" name="accountId" value="<?php echo $this->payment['account_id']; ?>" />
        <input type="hidden" name="currency" value="<?php echo $this->payment['currency']; ?>" />
        <input name="buyerEmail" type="hidden" value="<?php echo $this->correo; ?>">
        <input name="responseUrl" type="hidden" value="<?php echo $this->payment['responseUrl']; ?>">
        <input name="confirmationUrl" type="hidden" value="<?php echo $this->payment['confirmationUrl']; ?>">
        <input type="hidden" name="description" value="Compra <?php echo $this->cantidad ?> boletas <?php echo $this->datoscompra->boleta_tipo_nombre ?> para el evento <?php echo $this->datoscompra->programacion_nombre ?> ">
        <input name="buyerFullName" type="hidden" value="<?php echo $this->nombre; ?>">
        <input name="telephone" type="hidden" value="<?php echo $this->telefono; ?>">
        <input name="buyerDocument" type="hidden" value="<?php echo $this->cedula; ?>">


   
    </form>
    <script type="text/javascript">
           document.getElementById('formpayu').submit();
    </script>
<?php } ?>