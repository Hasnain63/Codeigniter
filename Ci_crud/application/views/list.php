<?php $this->load->view('header'); ?>


<div class="container pt-4">

    <?php if ($this->session->flashdata()) { ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('message') ?>
    </div>
    <?php } ?>

    <h3>Record List</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="pt-3">
                <a href="<?php echo base_url() . 'index.php/User/create/'; ?>" class="btn btn-primary">Create</a>
            </div>
            <table class="table table-striped pt-2">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Emial</th>
                        <th scope="col">Created date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <?php foreach ($rows as $row) { ?>
                <tbody>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><a class="btn btn-primary"
                            href="<?php echo base_url() . 'index.php/User/edit/' . $row['id']; ?>">Edit</a>
                        <a class="btn btn-danger"
                            href="<?php echo base_url() . 'index.php/User/delete/' . $row['id']; ?>">Delete</a>
                    </td>
                </tbody>
                <?php
                } ?>
            </table>
        </div>
    </div>

</div>

<?php $this->load->view('footer'); ?>