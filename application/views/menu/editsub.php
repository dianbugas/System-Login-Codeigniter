  </div>
  <!-- Modal -->
  <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <!-- method="post" ketika input tidak terlihat di url -->
              <!-- action untuk mengarakan controller menu -->
              <form action="<?php base_url('menu/submenu'); ?>" method="post">
                  <div class="modal-body">
                      <div class="form-group">
                          <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title">
                      </div>
                      <div class="form-group">
                          <select name="menu_id" id="menu_id" class="form-control">
                              <option value="">Select Menu</option>
                              <?php foreach ($menu as $m) : ?>
                              <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                      </div>
                      <div class="form-group">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                              <label class="form-check-label" for="is_active">
                                  Active?
                              </label>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Add</button>
                  </div>
              </form>
          </div>
      </div>
  </div>