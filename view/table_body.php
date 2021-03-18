<?php $even_number = 0; ?>
<?php $months = array("E", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"); ?>
<?php $mesesitos = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octumbre", "Noviembre", "Diciembre"); ?>
<?php foreach($socios as $socio): ?>
    <tr>
        <td class="img-member__container">
            <?php if(!empty($socio["photo"])): ?>
                <img class="img-member" src="data:image/ . '<?php echo $socio["photo_type"]; ?>';charset=utf8;base64, <?php echo base64_encode($socio["photo"]); ?>" alt="member-photo"> 
            <?php else: ?>
                <?php echo "No hay foto"; ?>
            <?php endif; ?>
        </td>
        <td><?php echo $socio["orden_number"]; ?></td>
        <td><?php echo $socio["socio_number"]; ?></td>
        <td>
            <?php if(isset($_SESSION["admin"])): ?>
                <a href="<?php echo "single.php?s=" . $socio["ID"]; ?>"><?php echo $socio["name"]; ?></a>
            <?php else: ?>
                <?php echo $socio["name"]; ?>
            <?php endif; ?>
        </td>
        <td><?php echo $socio["postal_code"]; ?></td>
        <td><?php echo $socio["ingreso"]; ?></td>
        <td><?php echo $socio["baja"]; ?></td>
        <td><?php echo $socio["email"]; ?></td>
        <td><?php echo $socio["cellphone"]; ?></td>
        <td><?php echo $socio["DNI"]; ?></td>
        <td><?php echo $socio["birth"]; ?></td>
        <td><?php echo $socio["nationality"]; ?></td>
        <td><?php echo $socio["activity"]; ?></td>
        <td class="months__span">
            <?php for($i = 0; $i < 12; $i++): ?>    
                <?php if(unserialize($socio["pagados"])[2021][$mesesitos[$i]] == 1): ?>
                    <span style="color:blue;"><?php echo $months[$i]; ?></span>
                <?php elseif(unserialize($socio["debidos"])[2021][$mesesitos[$i] . "Debe"] == 0): ?>
                    <span style="color:red;"><?php echo $months[$i]; ?></span>
                <?php else: ?>
                    <span style="color:grey;"><?php echo $months[$i]; ?></span>
                <?php endif; ?>
            <?php endfor; ?>
        </td>
    </tr>
<?php endforeach; ?>
