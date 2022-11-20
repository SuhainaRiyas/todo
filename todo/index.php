<?php
include '../config.php';
include 'includes/header.php';
include 'includes/navbar.php';

$sql = "SELECT * FROM task where user = '".$_SESSION['id']."' order by id desc";
$result = mysqli_query($connect,$sql);
?>
<div class="content-wrapper">
     <div class="card">
          <div class="card-body">
            <h3 class="text-center m-4">ToDo List</h3>
            <div class="row">
                <div class="col-sm-12 col-md-6" style="margin:auto;">
                <form method="post" action="taskaction.php" class="">
                    <div class="input-group">
                        <input type="text" class="form-control task_input" id="task_name" name="task_name" required placeholder="Task name" aria-label="Task name" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button" id="add_task" disabled="disabled">Add Task</button>
                        </div>
                    </div>
                </form>
                <div class="alert alert-danger mt-3" id="erroralert" role="alert" style="display:none;"></div>
                <div class="alert alert-success mt-3" id="successalert" role="alert" style="display:none;"></div>
                </div>
            </div>

            <div class="mt-5 mb-5">
            <table class="table table-striped tablesorter" id="task_table">
			<thead>
				<tr>
					<th>S.No.</th>
					<th>Task</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
                    $no = 1;
                 if(mysqli_num_rows($result)>0){
					while($data = mysqli_fetch_assoc($result)){
				?>
				<tr>
					<td><?php echo $no++?></td>
                    <?php if($data['is_completed'] == "no"){ ?>
					    <td><?php echo $data['task_name']?></td>
                    <?php }else{ ?>
                        <td><s><?php echo $data['task_name']?></s></td>
                    <?php } ?>
					<td colspan="2">
						
							<?php if($data['is_completed'] == "no"){ ?>
								<button class="btn btn-success btn-sm" id="complete" onclick="complete(<?= $data['id'] ?>)" data-toggle="tooltip" data-placement="top" title="Mark as complete"><i class="fa fa-check-square"></i></button> 
							<?php }else{ ?>
                                <button class="btn btn-warning btn-sm" id="incomplete" onclick="incomplete(<?= $data['id'] ?>)" data-toggle="tooltip" data-placement="top" title="Mark as Incomplete"><i class="fa fa-times"></i></button> 
                            <?php } ?>
                                <button class="btn btn-danger btn-sm" id="delete" onclick="remove(<?= $data['id'] ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>

					</td>
				</tr>
				<?php
					}
                 }else{
                    echo '<td colspan="4" class="text-center"> No records </td>';
                 }
				?>
			</tbody>
		</table>
            </div>

          </div>
     </div>
 </div>
 
<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>