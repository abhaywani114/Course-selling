<div id="add_update_admin_modal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered modal-md" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">New Admin</h4>
      <button type="button" class="text-white close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <form method="post" id="update_admin_form" autocomplete="off">

         <div class="form-group">
            <input type="text" name="name" class="form-control" 
              value="<?php echo e($user->name??''); ?>" placeholder="Admin Name" required />
         </div>

         <div class="form-group">
            <input type="email" name="email" class="form-control" 
              value="<?php echo e($user->email??''); ?>" placeholder="Admin Email" required />
         </div>

         <div class="form-group">
            <select type="text" name="status" class="form-control"  required>
              <option value="active" class="form-control" <?php if($user->status == 'active'): ?> selected <?php endif; ?>>Active</option>
              <option value="inactive" class="form-control" <?php if($user->status == 'inactive'): ?> selected <?php endif; ?>>Inactive</option>
            </select>
         </div>
          <input type="hidden" name="admin_id" value="<?php echo e($user->id); ?>" />
         <div class="form-group row">
                    <div class="col-md-10 mx-auto d-block">
             <input type="submit" onclick="save_admin()" data-dismiss="modal"
              class=" shopping_cart_btn btn btn-primary py-1 px-5 btn-block btn-pill w-100" 
              value="Update Admin">
                    </div>
               </div>

      </form>
    </div>
     <div class="modal-footer" style="border: none;padding: 10px 0px;justify-content: space-evenly;">
      </div>
  </div>
</div>
</div><?php /**PATH D:\Server_Files\Network Venture\project_7001a\resources\views/components/admin_update_modal.blade.php ENDPATH**/ ?>