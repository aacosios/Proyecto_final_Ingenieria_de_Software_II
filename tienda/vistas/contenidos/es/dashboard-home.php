<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-start roboto-condensed-regular text-uppercase">
        <i class="fab fa-dashcube fa-fw"></i> &nbsp; Tienda Virtual Grupo 4
    </h3>
    <p class="lead">
        ¡Bienvenido <strong><?php echo $_SESSION['nombre_sto']." ".$_SESSION['apellido_sto'];?></strong>
    </p>
</div>

<!-- Content -->
<div class="full-box tile-container">
    <?php
        if($_SESSION['cargo_sto']=="Administrador"){
            $total_categorias=$ins_login->datos_tabla("Normal","categoria","categoria_id",0); 
    ?>
   
    <?php 
            $total_categorias->closeCursor();
            $total_categorias=$ins_login->desconectar($total_categorias);
        }

        $total_clientes=$ins_login->datos_tabla("Normal","cliente","cliente_id",0); 
    ?>
    <a href="<?php echo SERVERURL.DASHBOARD; ?>/client-list/" class="tile">
        <div class="tile-tittle">Clientes</div>
        <div class="tile-icon">
            <i class="fas fa-users fa-fw"></i>
            <p><?php echo $total_clientes->rowCount(); ?> Registrados</p>
        </div>
    </a>
    <?php 
        $total_clientes->closeCursor();
        $total_clientes=$ins_login->desconectar($total_clientes);

        $total_productos=$ins_login->datos_tabla("Normal","producto","producto_id",0);
    ?>
    <a href="<?php echo SERVERURL.DASHBOARD; ?>/product-list/" class="tile">
        <div class="tile-tittle">Productos</div>
        <div class="tile-icon">
            <i class="fas fa-box-open fa-fw"></i>
            <p><?php echo $total_productos->rowCount(); ?> Registrados</p>
        </div>
    </a>
    <?php
        $total_productos->closeCursor();
        $total_productos=$ins_login->desconectar($total_productos);

        if($_SESSION['cargo_sto']=="Administrador"){
            $total_usuarios=$ins_login->datos_tabla("Normal","usuario WHERE usuario_id!='1' AND usuario_id!='".$_SESSION['id_sto']."'","usuario_id",0);
    ?>
    <a href="<?php echo SERVERURL.DASHBOARD; ?>/admin-list/" class="tile">
        <div class="tile-tittle">Administradores</div>
        <div class="tile-icon">
            <i class="fas fa-user-secret fa-fw"></i>
            <p><?php echo $total_usuarios->rowCount(); ?> Registrados</p>
        </div>
    </a>
    <?php 
            $total_usuarios->closeCursor();
            $total_usuarios=$ins_login->desconectar($total_usuarios);
        }

        $total_pedidos=$ins_login->datos_tabla("Normal","venta WHERE venta_estado_envio='Pedido'","venta_id",0);
    ?>
    <a href="#" class="tile">
        <div class="tile-tittle">Pedidos</div>
        <div class="tile-icon">
            <i class="fas fa-truck-loading fa-fw"></i>
            <p><?php echo $total_pedidos->rowCount(); ?> Registrados</p>
        </div>
    </a>
    <?php 
        $total_pedidos->closeCursor();
        $total_pedidos=$ins_login->desconectar($total_pedidos);
    ?>
    <a href="#" class="tile">
        <div class="tile-tittle">Ventas</div>
        <div class="tile-icon">
            <i class="fas fa-file-invoice-dollar fa-fw"></i>
            <p>&nbsp;</p>
        </div>
    </a>
    
</div>