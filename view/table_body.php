<?php $even_number = 0; ?>
<?php foreach($socios as $socio): ?>
    <tr>
        <td class="img-member__container"><img class="img-member" src="data:image/ . '<?php echo $socio["photo_type"]; ?>';charset=utf8;base64, <?php echo base64_encode($socio["photo"]); ?>" alt="member-photo"></td>
        <td><?php echo $socio["orden_number"]; ?></td>
        <td><?php echo $socio["socio_number"]; ?></td>
        <td><?php echo $socio["name"]; ?></td>
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
            <span>E</span>
            <span>E</span>
            <span>E</span>
            <span>E</span>
            <span>E</span>
            <span style="color: green">E</span>
            <span>E</span>
            <span>E</span>
            <span>E</span>
            <span>E</span>
            <span>E</span>
            <span>E</span>
        </td>
    </tr>
<?php endforeach; ?>
