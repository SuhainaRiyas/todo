<?php
include '../config.php';
include 'includes/header.php';
include 'includes/navbar.php';

$sql = "SELECT * FROM task where user = '".$_SESSION['id']."' AND is_completed = 'yes' order by id desc";
$result = mysqli_query($connect,$sql);
?>
<div class="content-wrapper">
     <div class="card">
          <div class="card-body">
            <h3 class="text-center m-4">Completed List</h3>
	    <div class="alert alert-danger mt-3" id="erroralert" role="alert" style="display:none;"></div>
            <div class="alert alert-success mt-3" id="successalert" role="alert" style="display:none;"></div>
            <div class="mt-5 mb-5">
            <table class="table table-striped" id="task_table">
			<thead>
				<tr>
					<th>S.No.</th>
					<th>Task</th>
					<th>Action</th>
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
					<td><?php echo $data['task_name']?></td>
					<td colspan="2">
                        <button class="btn btn-warning btn-sm" id="incomplete" onclick="incomplete(<?= $data['id'] ?>)" data-toggle="tooltip" data-placement="top" title="Mark as Incomplete"><i class="fa fa-times"></i></button> 
                        <button class="btn btn-danger btn-sm" id="delete" onclick="remove(<?= $data['id'] ?>)"><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete the task"></i></button>
					</td>
				</tr>
				<?php
					}
                 }else{
                    echo '<td colspan="3" class="text-center"> No records </td>';
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
