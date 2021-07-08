<tr>
    <td> <?php echo $row['id']; ?></td>
    <td> <?php echo $row['name']; ?></td>
    <td> <?php echo $row['color']; ?></td>
    <td> <?php echo $row['transmition']; ?></td>
    <td> <?php echo $row['price']; ?></td>
    <td> <a href="javascript:void(0)" ; onclick="showEditForm(<?php echo $row['id']; ?>);"
            class="btn btn-sm btn-primary">Edit</a>
        <a href="javascript:void(0)" ; onclick="showEditForm(<?php echo $row['id']; ?>);"
            class="btn btn-sm btn-danger">Delete</a>
    </td>
</tr>