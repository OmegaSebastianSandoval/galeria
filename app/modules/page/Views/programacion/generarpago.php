<div class="d-none">
    <form>
        <script src="https://checkout.epayco.co/checkout.js" class="epayco-button"
            data-epayco-key="<?php echo $this->payment['PUBLIC_KEY']; ?>"
            data-epayco-amount="<?php echo $this->payment['amount']; ?>"
            data-epayco-name="Pago de Galería Café Libro"
            data-epayco-description="Compra <?php echo $this->cantidad ?> boletas <?php echo $this->datoscompra->boleta_tipo_nombre ?> para el evento <?php echo $this->datoscompra->programacion_nombre ?> "
            data-epayco-currency="cop"
            data-epayco-country="co"
            data-epayco-address-billing="<?php echo $this->correo; ?>"
            data-epayco-name-billing="<?php echo $this->nombre; ?>"
            data-epayco-mobilephone-billing=""
            data-epayco-number-doc-billing="<?php echo $this->cedula; ?>"
            data-epayco-test="false"
            data-epayco-autoclick="true"
            data-epayco-external="false"
            data-epayco-extra1="<?php echo $this->idboleta; ?>"
            data-epayco-extra2="<?php echo $this->cantidadboleta; ?>"
            data-epayco-extra3="<?php echo $this->tipoboleta; ?>"
            data-epayco-extra4="<?php echo $this->codigo; ?>"
            data-epayco-response="<?php echo $this->payment['responseUrl']; ?>"
            data-epayco-confirmation="<?php echo $this->payment['confirmationUrl']; ?>"
            data-epayco-implementation-type="script"
            >
        </script>
    </form>
</div>