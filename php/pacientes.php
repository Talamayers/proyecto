<?php

$historial_clinico = array(
    array("id" => 1, "nombre" => "Juan", "apellido" => "Pérez", "edad" => 35, "email" => "juan@example.com", "diagnostico" => "Caries"),
    array("id" => 2, "nombre" => "María", "apellido" => "Gómez", "edad" => 40, "email" => "maria@example.com", "diagnostico" => "Limpieza Dental")
);
?>


            <?php foreach ($historial_clinico as $paciente) : ?>
                <tr>
                    <td><?php echo $paciente['id']; ?></td>
                    <td><?php echo $paciente['nombre']; ?></td>
                    <td><?php echo $paciente['apellido']; ?></td>
                    <td><?php echo $paciente['edad']; ?></td>
                    <td><?php echo $paciente['email']; ?></td>
                    <td><?php echo $paciente['diagnostico']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>


