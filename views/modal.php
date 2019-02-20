
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Modals | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
   
</head>

<!-- Small Size -->
            <div class="modal fade" id="restock" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Modal title</h4>
                        </div>
                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($getproduct as $index => $prod):  ?> 
                        <form action="<?php $_PHP_SELF ?>" method="POST">
                            <div class="modal-body">
                            
                                
                                <div class="form-group form-float">
                                    <input value="<?php print_r($prod['qty']); ?>" hidden="" name="qty" id="qty"  ">
                                        <label class="form-label">Current Stock: <?php print_r($prod['qty']); ?></label>
                                </div>
                               

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input required="" type="number" id="number" name="stkqty" class="form-control" ">
                                        <label class="form-label">Add Stock Quantity </label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line error">
                                        <input required=""  type="password" id="password" name="password" class="form-control" ">
                                        <label class="form-label">Enter Password</label>
                                    </div>
                                </div> 
                            </div>
                            <div class="modal-footer">
                                <input hidden="" id="pid" name="pid"  value="<?php print_r($prod['pid']); ?>" >
                                <button type="submit" name="submit" value="restockprod" class="btn btn-link waves-effect">ADD STOCK</button>
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="updateuser" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">USER DETAILS</h4>
                        </div>
                        
                        <form action="<?php $_PHP_SELF ?>" method="POST">
                            <?php error_reporting(E_ERROR | E_PARSE); foreach ($getuserid as $index => $user):  ?> 
                            <div class="modal-body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="uname" name="uname" class="form-control" value="<?php echo $user['username']; ?>">
                                        <label class="form-label">Username: </label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" id="pwd" name="pwd" class="form-control" value="<?php echo $user['password']; ?>">
                                        <label class="form-label">Password: </label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="fname" name="fname" class="form-control" value="<?php echo $user['fname']; ?>">
                                        <label class="form-label">First Name: </label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="lname" name="lname" class="form-control" value="<?php echo $user['lname']; ?>">
                                        <label class="form-label">Last Name: </label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="mname" name="mname" class="form-control" value="<?php echo $user['mname']; ?>">
                                        <label class="form-label">Middle Name: </label>
                                    </div>
                                </div>
                                <?php if($data->uid != $user['uid']): ?>
                                <div class="form-group form-float">
                                    <select name="role" class="form-control show-tick">
                                        <option selected="selected" value="admin">Admin</option>
                                        <option value="cashier">Cashier</option>
                                    </select>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="modal-footer">
                                <input hidden=""  name="uid" value="<?php echo $user['uid']; ?>">
                                <button type="submit" name="submit" value="updateuser" class="btn btn-link waves-effect">SAVE CHANGES</button>
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                            </div>
                            <?php endforeach; ?>
                        </form>
                        
                    </div>
                </div>
            </div>




