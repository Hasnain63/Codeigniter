<div class="modal-body">
    <form action="" method="post" name="EditCarModel" id="EditCarModel">
        <input type="hidden" name="id" id="<?php echo $row['id']; ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>"
                placeholder="Name" aria-describedby="emailHelp">

        </div>
        <p class="nameError"></p>
        <div class="mb-3">
            <label for="coler" class="form-label">Color</label>
            <input type="text" class="form-control" name="color" id="color" placeholder="Color"
                value="<?php echo $row['color']; ?>" aria-describedby="emailHelp">
            <p class="colorError"></p>
        </div>

        <div class="mb-3">
            <label for="transmition" class="form-label">Transnition</label>
            <select name="transmition" class="form-control" id="transmition">
                <option value="automatic" <?php echo ($row['transmition'] == 'automatic') ? 'selected' : '' ?>>
                    Automatic
                </option>
                <option value="manual" <?php echo ($row['transmition'] == 'manual') ? 'selected' : '' ?>>Manual</option>

            </select>

        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" placeholder="Price" name="price" id="price"
                value="<?php echo $row['price']; ?>" aria-describedby="emailHelp">
            <p class="priceError"></p>
        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>