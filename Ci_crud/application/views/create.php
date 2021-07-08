<?php $this->load->view('header'); ?>
<div class="container pt-4">
    <h3>Create User</h3>
    <div class="row">
        <div class="col-md-8">


            <form method="POST" action="<?php echo base_url() . 'index.php/User/create'; ?>">
                <div class=" form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter Name" value="<?php echo set_value('name'); ?>">
                    <?php echo form_error('name'); ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>"
                        id="exampleInputPassword1" placeholder="email">
                    <?php echo form_error('email'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Clear</button>
            </form>
        </div>
    </div>

</div>
<?php $this->load->view('footer'); ?>